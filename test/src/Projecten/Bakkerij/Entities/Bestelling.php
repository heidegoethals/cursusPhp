<?php

namespace Projecten\Bakkerij\Entities; 

class Bestelling {
    private $bestelId; 
    private $producten = array(); 
    private $afhaalDag; 
    private $totaalPrijs; 
    private $klant; 
    
    function __construct($klant) {
        $this->klant = $klant;
        empty($this->producten);
        $this->totaalPrijs = 0; 
    }
    
    function getBestelId() {
        return $this->bestelId;
    }

    function getProducten() {
        return $this->producten;
    }

    function getAfhaalDag() {
        return $this->afhaalDag;
    }

    function getTotaalPrijs() {
        return $this->totaalPrijs;
    }

    function getKlant() {
        return $this->klant;
    }

    function addProduct($product) {
        array_push($this->producten, $product);
        $this->totaalPrijs += $product->getPrijs(); 
    }

    function setAfhaalDag($afhaalDag) {
        $this->afhaalDag = $afhaalDag;
    }
    
}