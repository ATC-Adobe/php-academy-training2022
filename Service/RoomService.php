<?php

namespace App\Service;

use App\Model\Room;
use App\Repository\RoomRepository;

class RoomService implements \IOStrategyInterface
{
    public function __construct(protected \IOHandlerInterface $io = new RoomRepository())
    {
    }

    public function readRooms(): bool|array
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
    public function setIo(\IOHandlerInterface $io): void
    {
        $this->io = $io;
    }
}