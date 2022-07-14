<?php

namespace App\Service;

use App\Model\Room;
use App\Repository\RoomRepository;

class RoomService implements \IOStrategyContextInterface
{
    public function __construct(protected \IOHandlerInterface $ioStrategy = new RoomRepository())
    {
    }

    public function readRooms(): bool|iterable
    {
        return $this->ioStrategy->readAll();
    }

    public function addRoom(Room $room): bool
    {
        return $this->ioStrategy->save($room);
    }

    /**
     * @param \IOHandlerInterface $ioStrategy
     */
    public function setIoStrategy(\IOHandlerInterface $ioStrategy): void
    {
        $this->ioStrategy = $ioStrategy;
    }
}