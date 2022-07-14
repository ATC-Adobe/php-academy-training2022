<?php

/**
 * @property int $id
 */
interface ModelInterface {
    public function toArray();
    public function fromArray(array $arr);
}


interface IOHandlerInterface {
    public function readAll(): iterable|bool;
    public function save(ModelInterface $model): bool;
}
interface IOStrategyContextInterface {
    public function __construct(IOHandlerInterface $ioStrategy);
    public function setIoStrategy(IOHandlerInterface $ioStrategy);
}