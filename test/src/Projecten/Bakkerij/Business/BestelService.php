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
        $bestellijnDAO = new BestellijnDAO(); 
        foreach ($bestellingen as $bestelling){
            $bestellijnDAO->addByBestelIdToBestellingen($bestelling->getBestelId()); 
        }
        return $bestellingen; 
    }
    
    public function startNieuweBestelling($klant){
        //TODO
    }
    
    public function voegToe($bestelling, $product, $aantal){
        //TODO
    }
    
    public function slaBestellingOp($bestelling, $afhaalDag){
        //TODO - ook gegevens van dag opvragen
    }
}