<?php 
	include_once("controller/Controller.php");

	//starting session
	session_start();
	//initializing $_SESSION['login']
	isset($_SESSION['login'])?null:$_SESSION['login']=0;
	//isset($_SESSION['user'])?null:$_SESSION['user']=null;

	//creatin controller object
	$controller = new Controller();

	//initializing $_GET['page']
	isset($_GET["page"])?null:$_GET["page"]="";

	//routing system
	switch($_GET["page"]){
		case "measurements":
			$controller->measurements();
			break;

		case "createUser":
			$controller->create_user();
			break;

		case "linkpatdoc":
			$controller->link_patients_doctors();
			break;	

		case "patient":
			$controller->patient();
			break;

		case "doctor":
			$controller->doctor();
			break;

		case "login":
			$controller->login();
			break;	
		case "logout":
			$controller->logout();
			break;
		default:
			$controller->invoke();
	}


?>