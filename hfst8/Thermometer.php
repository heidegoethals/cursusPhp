<?php

class Thermometer{
    private $graden; 
    public function __construct($graden) {
        $this->setGraden($graden); 
    }
    
    public function verhoog($aantalGraden){
        $this->setGraden($this->getGraden()+$aantalGraden); 
    }
    
    public function verlaag($aantalGraden){
        $this->setGraden($this->getGraden()-$aantalGraden); 
    }
    
    public function getGraden(){
        return $this->graden; 
    }
    
    public function setGraden($graden) {
        if (!($graden <-50) and !($graden>100)){
            $this->graden = $graden; 
        }
        
    }
}
