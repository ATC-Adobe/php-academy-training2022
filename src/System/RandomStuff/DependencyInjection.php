<?php
declare(strict_types = 1);
/* Dependency Injection */

echo "Dependency Injection <br>";


class DependencyCycleException extends Exception {
    public string $type;
    public function __toString() : string { return "Dependency {resolved from $this->type} forms a cycle"; }
}

class NotConstructableException extends Exception {
    public string $type;
    public function __toString() : string { return "$this->type cannot be constructed"; }
}

class AbstractOrInterfaceException extends Exception {
    public string $type;
    public function __toString() : string { return "$this->type is an Abstract class or an Interface and cannot be created"; }
}

class ClassNotExistsException extends Exception {
    public string $type;
    public function __toString() : string { return "$this->type doesn't exist"; }
}


class DependencyInjection {

    private array $typeAssoc;

    public function __construct() {
        $this->typeAssoc = [];
    }


    public function registerInstance(string $name, object $obj) : void {

        $this->typeAssoc[$name] = ['singleton', $obj];
    }

    public function registerRule(string $from, string $to) : void {

        $this->typeAssoc[$from] = ['rule', $to];
    }

    public function registerSingleton(string $from) : void {

        $this->typeAssoc[$from] = [$from, null];
    }

    private function getConstructor(string $type) : ?ReflectionMethod {

        try {
            return new ReflectionMethod($type, '__construct');
        }
        catch(\Throwable $e) {
            return null;
        }
    }

    /**
     //* @throws ReflectionException
     * @throws DependencyCycleException
     * @throws NotConstructableException
     * @throws AbstractOrInterfaceException
     * @throws ClassNotExistsException
     */
    public function constructRec(string $type, array $typeMap) : ?object {

        // if type contains the requested $type, it means there's cycle, and it cannot be resolved
        if(isset($typeMap[$type])) {
            throw new DependencyCycleException();
        }

        // if rules for given type doesn't exist, try to do it automatically
        if(!isset($this->typeAssoc[$type])) {

            // if type is not a class, nothing to be done here
            if(!class_exists($type)) {
                $e = new ClassNotExistsException();
                $e->type = $type;
                throw $e;
            }

            $refl = new ReflectionClass($type);

            // if class is abstract or is an interface, same story
            if($refl->isAbstract() || $refl->isInterface()) {
                $e = new AbstractOrInterfaceException();
                $e->type = $type;
                throw $e;
            }

            // get constructor
            $ctr = $this->getConstructor($type);

            // constructor does not exist, try calling default one
            if($ctr === null) {
                try {
                    return $refl->newInstance();
                }
                catch(ReflectionException $e) {
                    // if not successful, throw error
                    $e = new NotConstructableException();
                    $e->type = $type;
                    throw $e;
                }
            }

            // if constructor is not available, nothing can be done
            if($ctr->isPrivate() || $ctr->isProtected()) {
                $e = new NotConstructableException();
                $e->type = $type;
                throw $e;
            }

            // use found constructor

            $params = $ctr->getParameters();

            $args = [];

            // save the current type in the map
            $typeMap[$type] = true;


            // build each argument
            foreach($params as $param) {

                // if is nullable, easy
                if($param->allowsNull()) {
                    $args[] = null;
                    continue;
                }

                // if union , return first successful instance
                if($param instanceof ReflectionUnionType) {

                    $res = null;

                    foreach ($param->getTypes() as $t) {
                        try {
                            echo $t->getName();
                            $res = $this->constructRec(strval($t->getType()), $typeMap);
                            break;
                        }
                        catch(Exception $e) {
                            continue;
                        }
                    }

                    if($res === null) {
                        throw new NotConstructableException();
                    }

                    $args[] = $res;
                }
                else {
                    $args[] = $this->constructRec(strval($param->getType()), $typeMap);
                }
            }

            unset($typeMap[$type]);

            // once arguments are collected, try building object
            try {
                return $refl->newInstance(...$args);
            }
            catch(ReflectionException $e) {
                $e = new NotConstructableException();
                $e->type = $type;
                throw $e;
            }
        }

        // what if resolve rule is specified

        $rule = $this->typeAssoc[$type];

        if($rule[0] == 'rule') {

            $typeMap[$type] = true;

            $res = $this->constructRec($rule[1], $typeMap);

            unset($typeMap[$type]);

            return $res;
        }

        if($rule[0] == 'singleton') {

            if($rule[1] !== null) {
                return $rule[1];
            }

            unset($typeMap[$type]);

            $res = $this->constructRec($type, $typeMap);

            $this->typeAssoc[$type] = ['singleton', $res];

            return $res;
        }

        return null;
    }

    /**
     * @throws ClassNotExistsException
     * @throws AbstractOrInterfaceException
     * @throws DependencyCycleException
     * @throws NotConstructableException
     */
    public function construct(string $type) : ?object {
        return $this->constructRec($type, []);
    }
}

$di = new DependencyInjection();

//echo $di->construct('A').'<br><br>';
//echo $di->construct('B').'<br><br>';
//echo $di->construct('C').'<br><br>';

echo "Unit Tests<br>";

class A { public function __toString() : string { return 'A'; } }
class B {
    public function __construct() {}
    public function __toString() : string { return 'B'; }
}
class C {
    public ?A $a = null;
    public ?B $b = null;
    public function __construct(A $a, B $b) {
        $this->a = $a;
        $this->b = $b;
    }
    public function __toString() : string { return 'C'; }
}

(function() use ($di) {
    $a = $di->construct('A');
    assert($a instanceof A);

    echo "Test Passed<br>";
})();


(function() use ($di) {
    $c = $di->construct('C');
    assert($c instanceof C);
    assert($c->a instanceof A);
    assert($c->b instanceof B);

    echo "Test Passed<br>";
})();

class D {
    public function __construct(E $e) {}
}


class E {
    public function __construct(D $e) {}
}


(function() use ($di) {
    $e = null;
    try {
        $d = $di->construct('D');
    }
    catch(Exception $ex) {
        $e = $ex;
    }

    assert($e instanceof DependencyCycleException);
    echo "Test Passed<br>";
})();

interface IFoo {}
abstract class Bar {}

(function() use ($di) {

    $e = null;
    try {
        $d = $di->construct('IFoo');
    }
    catch(Exception $ex) {
        $e = $ex;
    }

    assert($e instanceof AbstractOrInterfaceException);

    try {
        $d = $di->construct('Bar');
    }
    catch(Exception $ex) {
        $e = $ex;
    }

    assert($e instanceof AbstractOrInterfaceException);

    echo "Test Passed<br>";
})();


(function() use ($di) {
    $ex = null;
    try {
        $e = $di->construct('SomeNonExistentClass');
    }
    catch(ClassNotExistsException $er) {
        $ex = $er;
    }
    assert($ex instanceof ClassNotExistsException);
    echo "Test Passed<br>";
})();


class F { private function __construct() {}}

(function() use ($di) {
    $ex = null;
    try {
        $e = $di->construct('F');
    }
    catch(NotConstructableException $e) {
        $ex = $e;
    }

    assert($ex instanceof NotConstructableException);
    echo "Test Passed<br>";
})();

(function() use ($di) {
    $ex = null;
    try {
        $e = $di->construct('int');
    }
    catch(ClassNotExistsException $e) {
        $ex = $e;
    }

    assert($ex instanceof ClassNotExistsException);
    echo "Test Passed<br>";
})();

var_dump (new ReflectionNamedType('A|B'));

class N {
    private IFoo&A $val;
}

