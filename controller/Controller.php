<?php
include_once("model/Model.php");

class Controller {
	const PATIENT = 1;
	const DOCTOR = 2;
	const ADMIN = 3;
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

    } 

	//VIEWS
	public function invoke()
	{
		include "view/homepage.php";
	}

	public function measurements()
	{
		$measurements =	$this->model->getMeasurements();
		$colors = $this->model->getColors();
		include "view/measurements.php";
	}

	//TODO: remove accounts
	public function create_user()
	{	
		$this->loginCheck(self::ADMIN);
		//check if a post request was sent
		if(count($_POST)>0){
			$this->model->insertUser();
		}
		$roles = $this->model->getRoles();

		$users = $this->model->getUsers();

		include "view/ADMcreateUser.php";
	}

	public function link_patients_doctors(){
		$this->loginCheck(self::ADMIN);
		var_dump($_POST);
		//ADD LINK
		$doctors = $this->model->getUserByRole(self::DOCTOR);

		if(isset($_POST["doctor"])){
			//getting the patients not linked with the selected doctor
			$unlinked_patients = $this->model->getUnlinkedPatients($_POST["doctor"]);
			//getting the patients  linked with the selected doctor
			$linked_patients = $this->model->getLinkedPatients($_POST["doctor"]);
			//getting selected doctor infos
			$selected_doctor = $this->model->getUserById($_POST["doctor"]);
		}

		//adding the link doctor-patient to the DB
		if(isset($_POST["doctor"]) && isset($_POST["patient"])){
			$this->model->addLinkPatDoc();
			unset($_POST["doctor"]);
		} 

		//SEE LINKS

		//getting data to print the doctor's patients
		// if(isset($_POST["doctor_vis"])){
		// 	//getting the patients not linked with the selected doctor
		// 	$patients_vis = $this->model->getLinkedPatients($_POST["doctor_vis"]);
		// 	//getting selected doctor infos
		// 	$doctor_sel = $this->model->getUserById($_POST["doctor_vis"]);
		// }

		//REMOVE LINKS
		if(isset($_POST["REMdoctorid"]) && isset($_POST["REMpatientid"])){
			$this->model->removeLinkPatDoc();
		}

		include "view/ADMlinkPatDoc.php";
	}

	public function patient()
	{	
		$this->loginCheck(self::PATIENT);

		//if the form has been sent add the measurement to the database
		if(!empty($_POST["ph"])&&!empty($_POST["chlorides"])&&!empty($_POST["lactic_acid"])&&!empty($_POST["glucose"])){
			$this->model->addMeasurement();
		}

		//array of the doctors linked to the session user
		$linked_doctors = $this->model->getLinkedDoctors($_SESSION["user"]->iduse);

		//VISUALIZE measurements
		$measurements = $this->model->getMeasurementsByUser($_SESSION['user']->iduse);

		include "view/PATpatient.php";
	}

	public function doctor()
	{	
		$this->loginCheck(self::DOCTOR);
		include "view/doctor.php";
	}

	public function login()
	{
		if(isset($_POST['email'])&&isset($_POST['password'])){
			$user = $this->model->validateLogin($_POST['email'], $_POST['password']);
			$user->role = $this->model->getRoleById($user->codrol);
			$_SESSION['user'] = $user;
		}
		if(isset($_SESSION['user'])){
			switch($_SESSION['user']->codrol){
				case 1:
					header('Location: ?page=patient');
					break;
				case 2:
					header('Location: ?page=doctor');
					break;
				case 3:
					header('Location: ?page=createUser');
					break;			
			}
		}

		include "view/login.php";
	}


	//<FUNCTIONS
	public function loginCheck($role){
		//check if the user is logged 
		if(!isset($_SESSION['user'])){
			header('Location: ?page=login');
		}else{
			//and if he has the permissions to access the page
			if(!($role == $_SESSION['user']->codrol)){
				header('Location: ?page=accessdenied');
			}
		}
	}

	public function logout(){
		unset($_SESSION['user']);
		header('Location: ?page=login');	
	}
}
?>