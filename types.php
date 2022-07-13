<?php

/**
 * @property int $id
 */
interface ModelInterface {
    public function toArray();
    public function fromArray(array $arr);
}


interface IOHandlerInterface {
    /**
     * @return iterable|false
     */
    public function readAll(): iterable|false;
    public function save(ModelInterface $model): bool;
}
interface IOStrategyContextInterface {
    public function __construct(IOHandlerInterface $io);
    public function setIoStrategy(IOHandlerInterface $io);
}