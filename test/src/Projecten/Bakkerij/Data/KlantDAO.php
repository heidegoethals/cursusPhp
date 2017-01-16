<?php
namespace Projecten\Bakkerij\Data; 

use Projecten\Bakkerij\Entities\Klant; 
use PDO; 

class KlantDAO {
    
    public function getWoonplaatsId($postcode){
        $sql = "select ID
            from cities  
            where Zipcode = :postcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':postcode' => $postcode));
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        return $id['ID'];
    }
    
    public function getByEmail($emailklant) {
        $sql = "select email, wachtwoord, naam, voornaam, straat, huisnr, cities.Zipcode as postcode, cities.Name as gemeente, geblokkeerd
            from klant, cities  
            where klant.woonplaatsId = cities.ID and email = :email";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':email'=>$emailklant));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $klant = Klant::create($rij["email"], $rij["wachtwoord"], $rij["naam"], $rij["voornaam"], $rij["straat"], $rij["huisnr"], $rij["postcode"], $rij["gemeente"]);
        if ($rij["geblokkeerd"]==true){
            $klant->setGeblokkeerd(true); 
        }
        $dbh = null;
        return $klant;
    }   
    
    public function slaKlantOp($klant){
            $sql = "insert klant 
                set email = :email, wachtwoord = :wachtwoord, naam = :naam, voornaam = :voornaam, straat = :straat, huisnr = :huisnr, woonplaatsId = :woonplaatsId, geblokkeerd = :geblokkeerd";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $woonplaatsId = $this->getWoonplaatsId($klant->getPostcode()); 
            $stmt->execute(array(':email' => $klant->getEmail(),
                ':wachtwoord' => $klant->getWachtwoord(), ':naam' => $klant->getnaam(), ':voornaam' =>$klant->getVoornaam(), ':straat'=>$klant->getStraat(), ':huisnr'=>$klant->getHuisnr(), ':woonplaatsId'=>$woonplaatsId, ':geblokkeerd'=>$klant->getGeblokkeerd()));
            $dbh = null;
    }
    
    public function updateKlant($klant){
            $sql = "update klant 
                set wachtwoord = :wachtwoord, naam = :naam, voornaam = :voornaam, straat = :straat, huisnr = :huisnr, woonplaatsId = :woonplaatsId, geblokkeerd = :geblokkeerd
                where email = :email";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $woonplaatsId = $this->getWoonplaatsId($klant->getPostcode()); 
            $stmt->execute(array(':email' => $klant->getEmail(),
                ':wachtwoord' => $klant->getWachtwoord(), ':naam' => $klant->getnaam(), ':voornaam' =>$klant->getVoornaam(), ':straat'=>$klant->getStraat(), ':huisnr'=>$klant->getHuisnr(), ':woonplaatsId'=>$woonplaatsId, ':geblokkeerd'=>$klant->getGeblokkeerd()));
            $dbh = null;
    }
}