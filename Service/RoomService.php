<?php

namespace App\Service;

use App\Model\Room;
use App\Repository\RoomRepository;

class RoomService implements \IOStrategyContextInterface
{
    public function __construct(protected \IOHandlerInterface $io = new RoomRepository())
    {
    }

    public function readRooms(): bool|iterable
    {
        return $this->io->readAll();
    }

    public function addRoom(Room $room): bool
    {
        return $this->io->save($room);
    }

    /**
     * @param \IOHandlerInterface $io
     */
    public function setIoStrategy(\IOHandlerInterface $io): void
    {
        $this->io = $io;
    }
}