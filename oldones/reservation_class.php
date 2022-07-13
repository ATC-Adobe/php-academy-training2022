<?php
include("ConnectionClass.php");

class ReservationService
{
	#private $reservation_id;
	private $room_id;
	private $firstname;
	private $lastname;
	private $email;
	private $start_date;
	private $end_date;

	
	function __construct()
	{

	}
	
	public function readReservations()
	{
        $dbConnection = MysqlConnection::getInstance();
        $query = "SELECT * FROM room";
        $result = $dbConnection->query($query)->fetchAll();

        return $result;


        #$reservations = [];
		#$file = new SplFileObject("reservations.csv", 'r');
		#$aa = 0;
		#while(!$file->eof())
		#{
			#$line = $file->fgetcsv();
			#if($aa==$count = count(file("reservations.csv"))){break;};
			#$reservations[] = $line;
			#$aa++;
		#}

		#return $reservations;
	}
	
	public function generateCount()
	{
		$count = count(file("reservations.csv"));
		return $count;
	}

	public function addReservation()
	{
		#$this->reservation_id = $this->generateCount();
		$this->room_id = $_POST['reservation_id'];
		$this->firstname = $_POST['firstname'];
		$this->lastname = $_POST['lastname'];
		$this->email = $_POST['email'];
		$this->start_date = $_POST['startdate'];
		$this->end_date = $_POST['enddate'];
		#$newReserveArray = array([$this->reservation_id, $this->room_id, $this->firstname, $this->lastname, $this->email, $this->start_date, $this->end_date]);

        $this->start_date = new DateTime($this->start_date);
        $this->start_date = $this->start_date->format('m/d/Y H:i:s');

        $this->end_date = new DateTime($this->end_date);
        $this->end_date = $this->end_date->format('m/d/Y H:i:s');


        $dbConnection = MysqlConnection::getInstance();
        $insert = "INSERT INTO room (room_id, name, surname, email, start, end)
            VALUES (
                $this->room_id,
                '".$this->firstname."',
                '".$this->lastname."',
                '".$this->email."',
                STR_TO_DATE('".$this->start_date."','%m/%d/%Y %H:%i:%s'),
                STR_TO_DATE('".$this->end_date."','%m/%d/%Y %H:%i:%s')
                );
        " ;

        $dbConnection->query($insert);

		
		##$reservatioons = array_merge($array, $newReserveArray);
		#echo '<hr>';
		#var_dump($reservatioons);
		#$file = new SplFileObject("reservations.csv", "w");
		#foreach($reservatioons as $line){
		#$file->fputcsv($line);
		#}
	}
}
