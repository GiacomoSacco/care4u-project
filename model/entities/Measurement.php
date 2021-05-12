<?php

class Measurement {
	public $idmea;
    public $codpat;
    public $coddot;
    public $ph;
    public $chlorides;
    public $lactic_acid;
    public $glucose;
    public $time;
	
    public function __construct($obj)  
    {  
        $this->idmea = $obj->idmea;
        $this->codpat = $obj->codpat;
        $this->coddot = $obj->coddot;
	    $this->ph = $obj->ph;
	    $this->chlorides = $obj->chlorides;
        $this->lactic_acid = $obj->lactic_acid;
        $this->glucose = $obj->glucose;
        $this->time = $obj->time;
    }  
}

?>