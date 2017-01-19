<?php

namespace Projecten\Bakkerij\Entities; 

use Projecten\Bakkerij\Data\BestellingDAO; 

class Bestelling {
    private static $bestelMap = array(); 
    private $bestelId; 
    private $bestellijnen = array(); 
    private $afhaalDag; 
    private $totaalPrijs; 
    private $klant; 
    
    function __construct($klant) {
        $this->klant = $klant;
        empty($this->producten);
        $this->totaalPrijs = 0; 
        $bestellingDAO = new BestellingDAO; 
        $this->bestelId = $bestellingDAO->getNewBestelId(); 
    }
    
    public static function create($bestelId, $bestellijnen, $afhaalDag, $totaalPrijs, $klant) {
        if (!isset(self::$bestelMap[$bestelId])) {
            self::$bestelMap[$bestelId] = new Bestelling($klant);
        }
        $bestelling = self::$bestelMap[$bestelId]; 
        $bestelling->bestelId = $bestelId; 
        $bestelling->bestellijnen = $bestellijnen; 
        $bestelling->afhaalDag = $afhaalDag; 
        $bestelling->totaalPrijs = $totaalPrijs; 
        $bestelling->klant = $klant; 
        return $bestelling;
    }
    
    public static function createZonderBestellijnen($bestelId, $afhaalDag, $totaalPrijs, $klant) {
        if (!isset(self::$bestelMap[$bestelId])) {
            self::$bestelMap[$bestelId] = new Bestelling($klant);
        }
        $bestelling = self::$bestelMap[$bestelId]; 
        $bestelling->bestelId = $bestelId; 
        $bestelling->afhaalDag = $afhaalDag; 
        $bestelling->totaalPrijs = $totaalPrijs; 
        $bestelling->klant = $klant; 
        return $bestelling;
    }
    
    function getBestelId() {
        return $this->bestelId;
    }

    function getBestelLijnen() {
        return $this->bestellijnen;
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

    function addBestelLijn($bestellijn) {
        array_push($this->bestellijnen, $bestellijn);
        $this->totaalPrijs += $bestellijn->getTotaalPrijs(); 
    }

    function setAfhaalDag($afhaalDag) {
        $this->afhaalDag = $afhaalDag;
    }
    
    function setTotaalPrijs($totaalPrijs) {
        $this->totaalPrijs = $totaalPrijs;
    }
    
}