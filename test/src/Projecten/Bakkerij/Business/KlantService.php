<?php

namespace Projecten\Bakkerij\Business;

use Projecten\Bakkerij\Entities\Klant;
use Projecten\Bakkerij\Data\KlantDAO;
use Projecten\Bakkerij\Exceptions\FoutWachtwoordException; 

class KlantService {
    private function nieuwWachtwoord(){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $wachtwoord = '';
        for ($i = 0; $i < 6; $i++) {
            $wachtwoord .= $characters[rand(0, $charactersLength - 1)];
        }
        return $wachtwoord;
    }
    public function nieuweKlant($email, $naam, $voornaam, $straat, $huisnr, $postcode, $gemeente) {
        $wachtwoord = $this->nieuwWachtwoord(); 
        $klant = Klant::create($email, $wachtwoord, $naam, $voornaam, $straat, $huisnr, $postcode, $gemeente); 
        $klantDAO = new KlantDAO;      
        $klantDAO->slaKlantOp($klant); 
        return $klant;
    }
    
    public function meldAan($email, $wachtwoord){

        
        $klantDAO = new KlantDAO; 
        $klant = $klantDAO->getByEmail($email); 
        $wachtwoordsalt = sha1("salt".$wachtwoord."salt"); 
        if (!($klant->getWachtwoord() == $wachtwoordsalt)) {
            throw new FoutWachtwoordException();
        }        
        return $klant;
    }
    
    public function updateKlant($klant) {
        $klantDAO = new KlantDAO; 
        $klantDAO->updateKlant($klant); 
    }  


}

