<?php

namespace Test\Unit\System\RandomStuff\DependencyInjection;

use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Reflection;
use System\RandomStuff\DependencyInjection\DependencyInjection;
use System\RandomStuff\DependencyInjection\Exceptions\AbstractOrInterfaceException;
use System\RandomStuff\DependencyInjection\Exceptions\DependencyCycleException;
use System\RandomStuff\DependencyInjection\Exceptions\NotConstructableException;
use Test\Unit\System\RandomStuff\DependencyInjection\TestClasses\SampleA;
use Test\Unit\System\RandomStuff\DependencyInjection\TestClasses\SampleAbstractA;
use Test\Unit\System\RandomStuff\DependencyInjection\TestClasses\SampleB;
use Test\Unit\System\RandomStuff\DependencyInjection\TestClasses\SampleC;
use Test\Unit\System\RandomStuff\DependencyInjection\TestClasses\SampleD;
use Test\Unit\System\RandomStuff\DependencyInjection\TestClasses\SampleE;
use Test\Unit\System\RandomStuff\DependencyInjection\TestClasses\SampleInterfaceA;

class DITest extends TestCase {

    private ?DependencyInjection $di = null;

    public function getDI() : DependencyInjection {

        return $this->di ??= new DependencyInjection();
    }

    public function testBasicConstruct() {
        $a = null;
        try {
            $a = $this->getDI()->construct(SampleA::class);
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }

        $this->assertTrue($a instanceof SampleA);
    }


    public function testPrivateConstructor() {

        $this->expectException(NotConstructableException::class);

        $b = $this->getDI()->construct(SampleB::class);
    }

    public function testSingleton1() {

        $b = [null, null, null];

        $di = $this->getDI();
        $di->registerInstance(SampleB::class ,$e = SampleB::getInst());

        for($i = 0; $i < 3; $i++) {
            $b[$i] = $di->construct(SampleB::class);
        }

        for($i = 0; $i < 3; $i++) {
            $this->assertEquals($e, $b[$i]);
        }
    }

    public function testSingleton2() {

        $a = [null, null, null];

        $di = $this->getDI();
        $di->registerSingleton(SampleA::class);

        $e = $di->construct(SampleA::class);

        for($i = 0; $i < 3; $i++) {
            $a[$i] = $di->construct(SampleA::class);
        }

        for($i = 0; $i < 3; $i++) {
            $this->assertEquals($e, $a[$i]);
        }

        $this->assertNotEquals($e, new SampleA());
    }

    public function testAbstractAndInterface() {

        $this->expectException(AbstractOrInterfaceException::class);

        $di = $this->getDI();

        $a = $di->construct(SampleAbstractA::class);
        $a = $di->construct(SampleInterfaceA::class);
    }

    public function testBuildingConstructors() {

        $di = $this->getDI();

        $c = $di->construct(SampleC::class);

        $this->assertTrue($c instanceof SampleC);
        $this->assertTrue($c->a instanceof SampleA);
        $this->assertTrue($c->b === null);
    }

    public function testDependencyCycle() {
        $this->expectException(DependencyCycleException::class);

        $d = $this->getDI()->construct(SampleD::class);
    }

    public function testRules() {

        $di = $this->getDI();
        $di->registerRule(SampleInterfaceA::class, SampleE::class);

        $this->assertTrue($di->construct(SampleInterfaceA::class) instanceof SampleE);
    }

}

