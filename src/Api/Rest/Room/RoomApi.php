<?php

namespace Api\Rest\Room;

use Reservation\ReservationRepository;

class RoomApi
{
    public function getAllReservations()
    {
        try {
            $repo = new ReservationRepository();
            $results = $repo->getAllReservations();

            $reservations = [];
            foreach ($results as $result) {
                $reservations[] = [
                    'reservationId' => $result['id'],
                    'userId' => $result['userId'],
                    'roomId' => $result['roomId'],
                    'firstName' => $result['firstName'],
                    'lastName' => $result['lastName'],
                    'email' => $result['email'],
                    'startDay' => $result['startDay'],
                    'endDay' => $result['endDay'],
                    'startHour' => $result['startHour'],
                    'endHour' => $result['endHour']
                ];
            }
            return $reservations;
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }

    public
    function getCurrentlyAvailableReservations()
    {
        try {
            $repo = new ReservationRepository();
            $results = $repo->getCurrentlyAvailableReservations();

            $reservations = [];
            foreach ($results as $result) {
                $reservations[] = [
                    'reservationId' => $result['id'],
                    'userId' => $result['userId'],
                    'roomId' => $result['roomId'],
                    'firstName' => $result['firstName'],
                    'lastName' => $result['lastName'],
                    'email' => $result['email'],
                    'startDay' => $result['startDay'],
                    'endDay' => $result['endDay'],
                    'startHour' => $result['startHour'],
                    'endHour' => $result['endHour']
                ];
            }
            return $reservations;
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }

    public function getUserReservations($id)
    {
        try {
            $repo = new ReservationRepository();
            $results = $repo->getMyReservations($id);

            $reservations = [];
            foreach ($results as $result) {
                $reservations[] = [
                    'userId' => $result['id'],
                    'reservationId' => $result['0'],
                    'roomId' => $result['roomNumber'],
                    'firstName' => $result['firstName'],
                    'lastName' => $result['lastName'],
                    'email' => $result['email'],
                    'startDay' => $result['startDay'],
                    'endDay' => $result['endDay'],
                    'startHour' => $result['startHour'],
                    'endHour' => $result['endHour']
                ];
            }
            return $reservations;
        } catch (\Exception $e) {
            return ['message' => $e->getMessage()];
        }
    }
}