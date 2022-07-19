<?php
declare(strict_types = 1);
/* Dependency Injection */

echo "Dependency Injection <br>";

class A { public function __toString() : string { return 'A'; } }
class B { public function __toString() : string { return 'B'; } }
class C {
    public A $a;
    public B $b;
    public function __construct(A $a, B $b) {
        $this->a = $a;
        $this->b = $b;
    }
    public function __toString() : string { return 'C'; }
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

    public function construct(string $type) : ?object {
        if(!isset($this->typeAssoc[$type])) {
            try {
                $refl = new ReflectionClass($type);
                $ctr = $this->getConstructor($type);

                if($ctr === null) {
                    return $refl->newInstance();
                }

                $params = $ctr->getParameters();

                $args = [];

                foreach($params as $param) {
                    $args[] = $this->construct(strval($param->getType()));
                }

                return $refl->newInstance(...$args);
            }catch (\Throwable $e) {
                echo $e.'<br>';
                return null;
            }
        }

        return null;
    }
}

$di = new DependencyInjection();

//echo $di->construct('A').'<br><br>';
//echo $di->construct('B').'<br><br>';
echo $di->construct('C').'<br><br>';

echo "Unit Tests<br>";


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



