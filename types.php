<?php
interface RepositoryInterface {
    public function save(ModelInterface $model): bool;
    public function readAll(): bool|array;
}

/**
 * @property int $id
 */
interface ModelInterface {
}