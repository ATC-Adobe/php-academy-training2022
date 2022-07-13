<?php

declare(strict_types=1);

namespace Controllers;

use Reservation\ReservationRepository;
use Reservation\ReservationService;

class UpdateReservation
{
    public function editReservation()
    {
        $editReservation = new ReservationRepository();
        $editReservation->editReservation();
    }

    public function updateReservation()
    {
        $updateReservation = [
            'id' => $_GET['id'],
            'roomId' => $_POST['roomId'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'startDay' => $_POST['startDay'],
            'endDay' => $_POST['endDay'],
            'startHour' => $_POST['startHour'],
            'endHour' => $_POST['endHour']

        ];

        $reservationService = new ReservationService();
        $reservationService->updateReservation($updateReservation);
    }






//    private $connection;
//
//    public function __construct()
//    {
//        $this->connection = MysqlConnection::getInstance();
//    }
//
//    public function editReservation(){
//
//        $id = $_GET['id'] ?? null;
//
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $updatedRoomId = $_POST['roomId'];
//            $updatedFirstName = $_POST['firstName'];
//            $updatedLastName = $_POST['lastName'];
//            $updatedEmail = $_POST['email'];
//            $updatedStartDay = $_POST['startDay'];
//            $updatedEndDay = $_POST['endDay'];
//            $updatedStartHour = $_POST['startHour'];
//            $updatedEndHour = $_POST['endHour'];
//
//            $updateRoom = "UPDATE rooms SET roomId = :roomId, firstName = :firstName, lastName = :lastName, email = :email, startDay = :startDay, endDay = :endDay, startHour = :startHour, endHour = :endHour WHERE id = :id";
//
//            $statement = $this->connection->prepare($updateRoom);
//
//            $statement->bindValue(':roomId', $updatedRoomId);
//            $statement->bindValue(':firstName', $updatedFirstName);
//            $statement->bindValue(':lastName', $updatedLastName);
//            $statement->bindValue(':email', $updatedEmail);
//            $statement->bindValue(':startDay', $updatedStartDay);
//            $statement->bindValue(':endDay', $updatedEndDay);
//            $statement->bindValue(':startHour', $updatedStartHour);
//            $statement->bindValue(':endHour', $updatedEndHour);
//            $statement->bindValue(':id', $id);
//            $statement->execute();
//
//            header('Location:../../View/reservationsList.php');
//        }
//    }
}