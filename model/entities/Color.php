<?php

class Color {
	public $idcol;
	public $color;
	public $description;
	
	// public function __construct($idcol, $author, $description)  
    // {  
    //     $this->idcol = $idcol;
	//     $this->author = $author;
	//     $this->description = $description;
    // } 
	public function __construct($obj)  
    {  
        $this->idcol = $obj->idcol;
	    $this->author = $obj->color;
	    $this->description = $obj->description;
    } 
}

?>