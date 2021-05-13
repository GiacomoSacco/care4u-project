<?php

class Measurement {
	public $idmea;
    public $codlin;
    public $ph;
    public $chlorides;
    public $lactic_acid;
    public $glucose;
    public $time;
	
    public function __construct($obj)  
    {  
        $this->idmea = $obj->idmea;
        $this->codlin = $obj->codlin;
	    $this->ph = $obj->ph;
	    $this->chlorides = $obj->chlorides;
        $this->lactic_acid = $obj->lactic_acid;
        $this->glucose = $obj->glucose;
        $this->time = $obj->time;
    }  
}

?>