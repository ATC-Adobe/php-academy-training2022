<?php
declare(strict_types = 1);
/* Dependency Injection */

namespace System\RandomStuff\DependencyInjection;

use System\RandomStuff\DependencyInjection\Exceptions\AbstractOrInterfaceException;
use System\RandomStuff\DependencyInjection\Exceptions\ClassNotExistsException;
use System\RandomStuff\DependencyInjection\Exceptions\DependencyCycleException;
use System\RandomStuff\DependencyInjection\Exceptions\NotConstructableException;

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

    private function getConstructor(string $type) : ?\ReflectionMethod {

        try {
            return new \ReflectionMethod($type, '__construct');
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
                throw new ClassNotExistsException($type);
            }

            $refl = new \ReflectionClass($type);

            // if class is abstract or is an interface, same story
            if($refl->isAbstract() || $refl->isInterface()) {
                throw new AbstractOrInterfaceException($type);
            }

            // get constructor
            $ctr = $this->getConstructor($type);

            // constructor does not exist, try calling default one
            if($ctr === null) {
                try {
                    return $refl->newInstance();
                }
                catch(\ReflectionException $e) {
                    // if not successful, throw error
                    throw new NotConstructableException($type);
                }
            }

            // if constructor is not available, nothing can be done
            if($ctr->isPrivate() || $ctr->isProtected()) {
                throw new NotConstructableException($type);
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
                if($param instanceof \ReflectionUnionType) {

                    $res = null;

                    foreach ($param->getTypes() as $t) {
                        try {
                            echo $t->getName();
                            $res = $this->constructRec(strval($t->getType()), $typeMap);
                            break;
                        }
                        catch(\Exception $e) {
                            continue;
                        }
                    }

                    if($res === null) {
                        throw new NotConstructableException($type);
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
            catch(\ReflectionException $e) {
                throw new NotConstructableException($type);
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
