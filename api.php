<?php
    declare(strict_types=1);
    require './vendor/autoload.php';

    use Api\Reservation\ReservationApi;
    use System\Session\Session;

    $session = Session::getInstance();

    //TODO:: API ROUTER CLASS
    //NOW ONLY FOR TESTING

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('action', $_REQUEST)) {
        $api = new Api();
        $api->get($_GET['action']);
    }

    class Api {
        protected ReservationApi $api;

        public function __construct () {
            $this->api = new ReservationApi();
        }

        public function get (string $action) :void {
            $res = match ($action) {
                'getAllReservations' => $this->encode($action),
                'getCurrentReservations' => $this->encode($action),
                default => json_encode([]),
            };
                header ('Content-Type: application/json');
                echo $res;
        }

        private function encode (string $action) :string {
            return json_encode($this->api->{$action}());
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getAllReservations', $_REQUEST)) {
        $api = new ReservationApi();

        header ('Content-Type: application/json');
        echo json_encode($api->getAllReservations());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('getCurrentReservations', $_REQUEST)) {
        $api = new ReservationApi();

        header ('Content-Type: application/json');
        echo json_encode($api->getCurrentReservations());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' &&
            (array_key_exists('getUserReservations', $_REQUEST)
            && array_key_exists('userId', $_REQUEST))) {
        $api = new ReservationApi();

        header ('Content-Type: application/json');
        echo json_encode($api->getUserReservations($_GET['userId']));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('addReservation', $_REQUEST)) {
        $api = new ReservationApi();


        header ('Content-Type: application/json');
        echo json_encode($api->addReservation());
    }