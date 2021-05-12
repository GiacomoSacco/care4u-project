<?php
//entities
include_once("model/entities/Color.php");
include_once("model/entities/Measurement.php");
include_once("model/entities/Role.php");
include_once("model/entities/User.php");
include_once("model/entities/LinkPatDoc.php");

class Model {
	const PATIENT = 1;
	const DOCTOR = 2;
	const ADMIN = 3;
	public $mysqli;

	public function __construct()  
	{  	
		//Generating database connection when a Model object is created
        $this->mysqli = new mysqli("localhost","root","","my_care4u");
		if ($this->mysqli -> connect_errno) {
			echo "Failed to connect to MySQL: " . $this->mysqli -> connect_error;
			exit();
		}
    }

	public function getMeasurements()
	{	
		//database connection object
		$mysqli = $this->mysqli;

		//getting all the Measurements
		$query = "SELECT * FROM Measurement;";
		$res = $mysqli->query($query);
		$measurements = array();
		
		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$measurements[] = new Measurement($obj);
		}
			
		return $measurements;
	}
	
	public function getColors()
	{
		//database connection object
		$mysqli = $this->mysqli;

		//getting the color schemes
		$query = "SELECT * FROM Color;";
		$res = $mysqli->query($query);
		$colors = array();

		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$colors[] = new Color($obj);
		}
		return $colors;
	}
	
	/**
	 * Administration.php
	 */

	public function insertUser(){
		//database connection object
		$mysqli = $this->mysqli;
		//Getting the data from the form
		$codrol = $_POST['codrol'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$name = $_POST['name'];
		$surname = $_POST['surname'];

		//insert the data into the DB
		$query = "INSERT INTO user (codrol, email, `password`, `name`, surname) 
					VALUES ($codrol, '$email', '$password', '$name', '$surname');";
		
		$res = $mysqli->query($query);
	}

	public function getRoles(){
		//database connection object
		$mysqli = $this->mysqli;

		//
		$query = "SELECT * FROM `role`";
		$res = $mysqli->query($query);
		$roles = array();

		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$roles[] = new Role($obj);
		}
		return $roles;
	}
	
	public function getUsers(){
		//database connection object
		$mysqli = $this->mysqli;

		//
		$query = "SELECT * FROM `user`";
		$res = $mysqli->query($query);
		$users = array();

		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$users[] = new User($obj);
		}
		return $users;
	}

	public function getUserByRole($role){
		//database connection object
		$mysqli = $this->mysqli;

		//
		$query = "SELECT * FROM `user` WHERE codrol = $role;";
		$res = $mysqli->query($query);
		$users = array();

		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$users[] = new User($obj);
		}
		return $users;
	}

	public function getUserById($id){
		//database connection object
		$mysqli = $this->mysqli;

		//
		$query = "SELECT * FROM `user` WHERE iduse = $id;";
		$res = $mysqli->query($query);

		$obj = $res->fetch_object();
		$user = new User($obj);

		return $user;
	}

	public function addLinkPatDoc(){
		//database connection object
		$mysqli = $this->mysqli;

		$idpat = $_POST["patient"];
		$iddoc = $_POST["doctor"];

		//check if they are already linked
		$query = "SELECT * FROM linkpatdoc WHERE codpat = $idpat AND coddoc = $iddoc";
		$res = $mysqli->query($query);
		if($res->num_rows == 0){
			//query to add the link to the table 
			$query = "INSERT INTO `linkpatdoc` (codpat, coddoc) VALUES ($idpat, $iddoc);";
			$res = $mysqli->query($query);
		}else{
			echo "patient [$idpat] and doctor [$iddoc] are already linked!<br>";
		}
	}

	public function removeLinkPatDoc(){
		//database connection object
		$mysqli = $this->mysqli;

		$idpat = $_POST["REMpatientid"];
		$iddoc = $_POST["REMdoctorid"];

		//check if they are already linked
		$query = "DELETE FROM linkpatdoc WHERE codpat = $idpat AND coddoc = $iddoc";
		$res = $mysqli->query($query);
		
	}

	public function getUnlinkedPatients($iddoc){
		//database connection object
		$mysqli = $this->mysqli;

		//list of the patients already linked withe the doctor
		$query = "SELECT * FROM linkpatdoc WHERE coddoc = $iddoc;";
		$res = $mysqli->query($query);
		$pat_blacklist = array();		//iduse of the patients already linked

		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$pat_blacklist[] = $obj->codpat;
		}

		//Making filtered array (without already linked patients)
		$patients = $this->getUserByRole(self::PATIENT);
		$patients_filtered = array();

		foreach($patients as $patient){
			if(!in_array($patient->iduse, $pat_blacklist)){ //if patient ID isn't in the blacklist
				$patients_filtered[] = $patient;			//Add him
			}
		}

		return $patients_filtered;
	}

	public function getLinkedPatients($iddoc){
		//database connection object
		$mysqli = $this->mysqli;

		//list of the patients already linked withe the doctor
		$query = "SELECT * FROM linkpatdoc WHERE coddoc = $iddoc;";
		$res = $mysqli->query($query);
		$pat_blacklist = array();		//iduse of the patients already linked

		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$pat_blacklist[] = $obj->codpat;
		}

		//Making filtered array (without already linked patients)
		$patients = $this->getUserByRole(self::PATIENT);
		$patients_filtered = array();

		foreach($patients as $patient){
			if(in_array($patient->iduse, $pat_blacklist)){ //if patient ID isn't in the blacklist
				$patients_filtered[] = $patient;			//Add him
			}
		}

		return $patients_filtered;
	}

	public function getLinkedDoctors($iduse){
		//database connection object
		$mysqli = $this->mysqli;

		$query = "SELECT * FROM linkpatdoc WHERE codpat = $iduse;";
		//list of doctors already linked with the subject
		$res = $mysqli->query($query);
		$linked = array();		//iduse of the patients already linked
		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$linked[]=$obj->coddoc;
		}
		//Making filtered array (without already linked users)
		$doctors = $this->getUserByRole(self::DOCTOR);
		$doctors_filtered = array();

		foreach($doctors as $doctor){
			if(in_array($doctor->iduse, $linked)){ //if patient ID isn't in the blacklist
				$doctors_filtered[] = $doctor;			//Add him
			}
		}

		return $doctors_filtered;
	}
	/**
	 * patient.php
	 */
	public function addMeasurement(){
		//database connection object
		$mysqli = $this->mysqli;

		$codlin = $this->getLinkId($_POST["iddoc"], $_SESSION["user"]->iduse);
		$ph = $_POST["ph"];
		$chlorides =$_POST["chlorides"];
		$lactic_acid = $_POST["lactic_acid"];
		$glucose = $_POST["glucose"];
		$time = time();
		

		$query = "INSERT INTO measurement (codlin, ph, chlorides, lactic_acid, glucose, `time`)
					VALUES ('$codlin', '$ph', '$chlorides', '$lactic_acid', '$glucose', NOW());";
		echo $query;
		$res = $mysqli->query($query);
		var_dump($res);
	}

	public function getLinkId($iddoc, $idpat){
		//database connection object
		$mysqli = $this->mysqli;

		//search for link line
		$query = "SELECT * FROM `linkpatdoc` WHERE coddoc = $iddoc AND codpat = $idpat;";
		$res = $mysqli->query($query);

		$obj = $res->fetch_object();

		return $obj->idlin;
	}

	/**
	 * login.php
	 */
	public function validateLogin(){
		//database connection object
		$mysqli = $this->mysqli;

		//encrypting
		$password=md5($_POST['password']);

		//getting the color schemes
		$query = "SELECT * FROM `user`
				  WHERE `email`='$_POST[email]' AND `password`='$password';";
		$res = $mysqli->query($query);

		if($res){
			//TRUE: return what kind of account it is
			$obj = $res->fetch_object();
			return $obj;
		}else{
			//FALSE: return 0
			return 0;
		}
	}

}

?>