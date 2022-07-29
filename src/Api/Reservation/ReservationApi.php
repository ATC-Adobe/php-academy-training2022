<?php

    namespace Api\Reservation;

    use DateTime;
    use Exception;
    use Reservation\Repository\ReservationRepository;
    use Reservation\Service\ReservationService;
    use User\Authenticator;
    use System\Database\MysqlConnection;
    use System\Session\Session;
    use System\StatusHandler\Status;


    class ReservationApi {

        private MysqlConnection $mysql;
        private Session $session;

        public function __construct () {
            $this->mysql = MysqlConnection::getInstance();
            $this->session  = Session::getInstance();
        }

        public function getAllReservations() :array {
            $query = "SELECT * FROM reservations";

            return $this->getReservations($query);
        }

        public function getCurrentReservations () :array {
            $date = (new DateTime())->format('Y-m-d H:i:s');
            $query = "SELECT * FROM reservations WHERE start_date > '".$date."'";

            return $this->getReservations($query);
        }

        public function getUserReservations (int|string $userId) :array {
            if (!is_numeric($userId)) {
                return [];
            }

            $query = "SELECT * FROM reservations WHERE user_id=$userId";

            return $this->getReservations($query);
        }

        public function getNewestUserReservation (string $userId) :array {
            $query = "SELECT * FROM reservations WHERE user_id=$userId ORDER BY end_date DESC LIMIT 1";

            return $this->getReservations($query);
        }

        private function getReservations (string $query) :array {
            try {
                $result = $this->mysql->query($query)->fetchAll();

                $reservations = [];
                foreach ($result as $r) {
                    $reservations[] = [
                        'reservation_id'    => $r['reservation_id'],
                        'room_id'           => $r['room_id'],
                        'firstname'         => $r['firstname'],
                        'lastname'          => $r['lastname'],
                        'email'             => $r['email'],
                        'start_date'        => $r['start_date'],
                        'end_date'          => $r['end_date'],
                        'user_id'           => $r['user_id']
                    ];
                }
                return ['reservations' => $reservations];
            } catch (Exception $e) {
                return ['message' => $e->getMessage()];
            }
        }

        public function addReservation () :array {
            try {
                $username   = htmlspecialchars($_POST['username']);
                $password   = htmlspecialchars($_POST['password']);
                $user       = (new Authenticator())->login($username, $password);

                if (!$user) {
                    http_response_code(Status::API_UNAUTHORIZED);
                    throw new Exception(Status::getStatus(Status::API_UNAUTHORIZED)['msg']);
                }

                $repo = new ReservationRepository();
                $service = new ReservationService();

                $roomId     = htmlspecialchars($_POST['roomId']);
                $startDate  = $repo->dateManager->createDate(htmlspecialchars($_POST['startDate']), true);
                $endDate    = $repo->dateManager->createDate(htmlspecialchars($_POST['endDate']), true);

                if (!$repo->dateManager->isPastDate($startDate, $endDate) || !$repo->dateManager->isDateCorrect($startDate, $endDate)) {
                    http_response_code(Status::API_BAD_REQUEST);
                    throw new Exception(Status::getStatus(Status::API_BAD_REQUEST)['msg']);
                }

                if (!$repo->checkRoomAvailability($roomId ,$startDate, $endDate)) {
                    http_response_code(Status::API_CONFLICT);
                    throw new Exception(Status::getStatus(Status::API_CONFLICT)['msg']);
                }

                if (!$service->addReservation()) {
                    http_response_code(Status::API_SERVER_ERROR);
                    throw new Exception(Status::getStatus(Status::API_SERVER_ERROR)['msg']);
                }

                echo json_encode($this->getNewestUserReservation($user->getId()));

                throw new Exception(Status::getStatus($this->session->get('reservation'))['msg']);
            } catch (Exception $e) {
                return ['message' => $e->getMessage()];
            }

        }

    }