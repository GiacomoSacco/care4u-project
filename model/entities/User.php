<?php

class User {
	public $iduse;
    public $codrol;
    public $email;
    public $password;
	public $name;
	public $surname;
	

	public function __construct($obj)  
    {  
        $this->iduse = $obj->iduse;
	    $this->codrol = $obj->codrol;
        $this->email = $obj->email;
        $this->password = $obj->password;
        $this->name = $obj->name;
        $this->surname = $obj->surname;
    } 
}

?>