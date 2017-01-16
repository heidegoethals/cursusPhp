<?php

namespace Projecten\Bakkerij\Business;

use Projecten\Bakkerij\Entities\BestelLijn;
use Projecten\Bakkerij\Entities\Bestelling;

use Projecten\Bakkerij\Data\BestelLijnDAO;
use Projecten\Bakkerij\Data\BestellingDAO;

class BestelService{
    
    public function getBestellingen($klant) {
        $bestelDAO = new BestellingDAO; 
        $bestellingen = $bestelDAO->getByEmail($klant->getEmail()); 
        $bestellijnDAO = new BestellijnDAO; 
        foreach ($bestellingen as $bestelling){
            $bestellijnDAO->addByBestelIdToBestellingen($bestelling->getBestelId()); 
        }
        return $bestellingen; 
    }
    
    public function startNieuweBestelling($klant){
        $bestelling = new Bestelling($klant); 
        return $bestelling;
    }
    
    public function voegToe($bestelling, $product, $aantal){
        $bestellijn = new BestelLijn($product, $aantal); 
        $bestelling->addBestelLijn($bestellijn); 
    }
    
    public function slaBestellingOp($bestelling, $afhaalDag){
        $bestelling->setAfhaalDag($afhaalDag); 
        $bestellingDAO = new BestellingDAO; 
        $bestellingDAO->slaBestellingOp($bestelling);  
    }
    
    public function deleteBestelling($bestelling){
        $bestelDAO = new BestellingDAO; 
        $bestelDAO->deleteBestelling($bestelling); 
    }
}