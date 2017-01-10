<?php
namespace Projecten\Bakkerij\Entities; 

class Klant {

    private static $emailMap = array();
    private $email; 
    private $wachtwoord;
    private $naam;
    private $voornaam;
    private $straat;
    private $huisnr; 
    private $postcode; 
    private $gemeente; 
    private $geblokkeerd; 

    private function __construct($email, $wachtwoord, $naam, $voornaam, $straat, $huisnr, $postcode, $gemeente) {
        $this->email = $email; 
        $this->wachtwoord = $wachtwoord; 
        $this->naam = $naam; 
        $this->voornaam = $voornaam; 
        $this->straat = $straat; 
        $this->huisnr = $huisnr; 
        $this->postcode = $postcode; 
        $this->gemeente = $gemeente; 
        $this->geblokkeerd = 0; 
    }

    public static function create($email, $wachtwoord, $naam, $voornaam, $straat, $huisnr, $postcode, $gemeente) {
        if (!isset(self::$emailMap[$email])) {
            self::$emailMap[$email] = new Klant($email, $wachtwoord, $naam, $voornaam, $straat, $huisnr, $postcode, $gemeente);
        }
        return self::$emailMap[$email];
    }

    public function getEmail(){
            return $this->email;
    }

    public function getWachtwoord(){
            return $this->wachtwoord;
    }

    public function setWachtwoord($wachtwoord){
            $this->wachtwoord = $wachtwoord;
    }

    public function getNaam(){
            return $this->naam;
    }

    public function setNaam($naam){
            $this->naam = $naam;
    }

    public function getVoornaam(){
            return $this->voornaam;
    }

    public function setVoornaam($voornaam){
            $this->voornaam = $voornaam;
    }

    public function getStraat(){
            return $this->straat;
    }

    public function setStraat($straat){
            $this->straat = $straat;
    }

    public function getHuisnr(){
            return $this->huisnr;
    }

    public function setHuisnr($huisnr){
            $this->huisnr = $huisnr;
    }

    public function getPostcode(){
            return $this->postcode;
    }

    public function setPostcode($postcode){
            $this->postcode = $postcode;
    }

    public function getGemeente(){
            return $this->gemeente;
    }

    public function setGemeente($gemeente){
            $this->gemeente = $gemeente;
    }

    public function getGeblokkeerd(){
            return $this->geblokkeerd;
    }

    public function setGeblokkeerd($geblokkeerd){
            $this->geblokkeerd = $geblokkeerd;
    }

}
