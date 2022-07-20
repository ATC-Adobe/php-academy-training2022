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
        if(isset($typeMap[$type])) {
            throw new DependencyCycleException();
        }

        if(!isset($this->typeAssoc[$type])) {

            try {
                $refl = new ReflectionClass($type);
            }
            catch(ReflectionException $e) {
                $e = new ClassNotExistsException();
                $e->type = $type;
                throw $e;
            }


            if($refl->isAbstract() || $refl->isInterface()) {
                $e = new AbstractOrInterfaceException();
                $e->type = $type;
                throw $e;
            }

            $ctr = $this->getConstructor($type);


            if($ctr === null) {
                try {
                    return $refl->newInstance();
                }
                catch(ReflectionException $e) {
                    $e = new NotConstructableException();
                    $e->type = $type;
                    throw $e;
                }
            }

            if($ctr->isPrivate() || $ctr->isProtected()) {
                $e = new NotConstructableException();
                $e->type = $type;
                throw $e;
            }

            $params = $ctr->getParameters();

            $args = [];

            $typeMap[$type] = true;

            foreach($params as $param) {
                if($param->allowsNull()) {
                    $args[] = null;
                }
                elseif($param instanceof ReflectionUnionType) {

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

            try {
                return $refl->newInstance(...$args);
            }
            catch(ReflectionException $e) {
                $e = new NotConstructableException();
                $e->type = $type;
                throw $e;
            }
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

