<?php 
	include_once("controller/Controller.php");

	//starting session
	session_start();

	//creatin controller object
	$controller = new Controller();

	//initializing $_GET['page']
	isset($_GET["page"])?null:$_GET["page"]="";

	//routing system
	switch($_GET["page"]){
		case "createUser":
			$controller->create_user();
			break;

		case "linkpatdoc":
			$controller->link_patients_doctors();
			break;	

		case "patient":
			$controller->patient();
			break;

		case "DOCviewpat":
			$controller->viewpat();
			break;

		case "DOCaddpat":
			$controller->addpat();
			break;

		case "login":
			$controller->login();
			break;	
		case "logout":
			$controller->logout();
			break;
		case "nfc":
			$controller->nfc();
			break;
		default:
			$controller->login();
			// $controller->invoke();
	}


?>