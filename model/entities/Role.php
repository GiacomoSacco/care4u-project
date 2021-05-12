<?php

class Role {
	public $idrol;
    public $role;

	public function __construct($obj)  
    {  
        $this->idrol = $obj->idrol;
	    $this->role = $obj->role;
    } 
}

?>