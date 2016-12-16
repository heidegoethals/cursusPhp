<?php

class ModuleLijst{
    private $minPrijs;
    private $maxPrijs; 
    
    public function __construct($minPrijs, $maxPrijs) {
        $this->minPrijs = $minPrijs; 
        $this->maxPrijs = $maxPrijs; 
    }
    
    public function oefening9_1() {
        $lijst = $this->searchModules(); 
        $lijst = $this->formatModules($lijst); 
        return $lijst; 
    }
    
    public function getMinPrijs(){
        return $this->minPrijs; 
    }
    
    public function getMaxPrijs() {
        return $this->maxPrijs;        
    }
    
    public function searchModules(){
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "select * from modules where prijs >= ? and prijs <= ?"; 
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array($this->minPrijs,$this->maxPrijs)); 
        $lijst = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $dbh = null; 
        return $lijst; 
    }
    
    public function formatModules($lijst) {
        $printLijst = array(); 
        foreach ($lijst as $rij){
            $printRij = $rij["naam"] . " (" . $rij["prijs"] . " euro)"; 
            array_push($printLijst, $printRij); 
        }            
        return $printLijst;         
    }
}