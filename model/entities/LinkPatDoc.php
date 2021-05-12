<?php

class LinkPatDoc {
	public $idlin;
    public $codpat;
    public $coddoc;
	

	public function __construct($obj)  
    {  
        $this->idlin = $obj->idlin;
	    $this->codpat = $obj->codpat;
        $this->coddoc = $obj->coddoc;
    } 
}

?>