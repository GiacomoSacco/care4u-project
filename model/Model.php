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
		$query = "SELECT * FROM measurement ORDER BY `time` ASC;";
		$res = $mysqli->query($query);
		$measurements = array();
		
		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object();
			$measurements[] = $obj;
		}
			
		return $measurements;
	}
	
	/**
	 * Administration.php
	 */

	public function addUser($codrol, $name, $surname, $fiscalCode, $email, $password){
		//database connection object
		$mysqli = $this->mysqli;
		//encrypting password
		$password = md5($password);
		if($this->checkEmail($email)){
			//insert the data into the DB
			$query = "INSERT INTO user (codrol, email, `password`, `name`, surname, fiscalcode) 
						VALUES ($codrol, '$email', '$password', '$name', '$surname', '$fiscalCode');";
			if($res = $mysqli->query($query)){
				$query = "SELECT * FROM user WHERE email = '$email';";
				$res = $mysqli->query($query);
				$obj = $res->fetch_object();
				$obj->role = $this->getRoleById($obj->codrol);
				return $obj;
			}
		}else{
			//The email has already been used
			return false;
		}
	}

	public function checkEmail($email){
		//database connection object
		$mysqli = $this->mysqli;
		
		$query = "SELECT * FROM user WHERE email = '$email';";
		$res = $mysqli->query($query);
		
		if($res->num_rows == 0){
			return true;	//if email has not been used yet
		}else{	
			return false; 	//if email has already been used
		}
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

	public function getRoleById($idrol){
		//database connection object
		$mysqli = $this->mysqli;

		//query
		$query = "SELECT `role`, icon FROM `role` WHERE idrol=$idrol;";
		$res = $mysqli->query($query);
		if($res){
			$obj = $res->fetch_object();
			return $obj;
		}
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
			$obj->role = $this->getRoleById($obj->codrol);
			$users[] = $obj;
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

	public function getUserById($iduse){
		//database connection object
		$mysqli = $this->mysqli;

		//
		$query = "SELECT * FROM `user` WHERE iduse = $iduse;";
		$res = $mysqli->query($query);

		$obj = $res->fetch_object();
		$obj->role = $this->getRoleById($obj->codrol);
		$user = $obj;

		return $user;
	}

	public function addLinkPatDoc($idpat, $iddoc){
		//database connection object
		$mysqli = $this->mysqli;

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
				$patient->role = $this->getRoleById(self::PATIENT);
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
	public function addMeasurement($codpat, $ph, $chlorides, $lactic_acid, $glucose){
		//database connection object
		$mysqli = $this->mysqli;
	
		$query = "INSERT INTO measurement (codpat, ph, chlorides, lactic_acid, glucose, `time`)
					VALUES ('$codpat', '$ph', '$chlorides', '$lactic_acid', '$glucose', NOW());";
		
		if($res = $mysqli->query($query)){
			return "success";
		}else{
			return "error";
		}
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

	public function getMeasurementsByPatient($codpat)
	{	
		//database connection object
		$mysqli = $this->mysqli;

		//getting all the Measurements
		$query = "	SELECT * FROM measurement
					WHERE codpat = $codpat
					ORDER BY `time`";
		$res = $mysqli->query($query);
		$measurements = array();
		
		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object(); 
			$obj->patient = $this->getUserById($obj->codpat);
			$measurements[] = $obj;
		}
			
		return $measurements;
	}

	public function getPatMeaByDoctor($coddoc)
	{	
		//database connection object
		$mysqli = $this->mysqli;

		//getting patients linked with the doctor
		$query = "	SELECT codpat FROM linkpatdoc
					WHERE coddoc = $coddoc;"; 
		$res = $mysqli->query($query);
		
		//array of patients linked with the doctor
		for($i=0; $i < $res->num_rows; $i++){
			$obj = $res->fetch_object(); 
			$patients_mea[]=$this->getUserById($obj->codpat);
		}
		
		//adding measurements array field
		foreach($patients_mea as $patient){
			$patient->measurements = $this->getMeasurementsByPatient($patient->iduse);
		}
		
		//return an array of patients with their measurements
		return $patients_mea;
	}

	/**
	 * login.php
	 */
	public function validateLogin($email, $password){
		//database connection object
		$mysqli = $this->mysqli;

		//encrypting
		$password=md5($password);

		//getting the color schemes
		$query = "SELECT * FROM `user`
				  WHERE `email`='$email' AND `password`='$password';";
		$res = $mysqli->query($query);

		if($res->num_rows == 1){
			//TRUE: return what kind of account it is
			$obj = $res->fetch_object();
			$obj->role = $this->getRoleById($obj->codrol);
			return $obj;
		}else{
			//FALSE: return false
			return false;
		}
	}

}

?>