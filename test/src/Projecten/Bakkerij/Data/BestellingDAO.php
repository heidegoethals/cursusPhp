<?php

namespace Projecten\Bakkerij\Data;

use Projecten\Bakkerij\Data\DBConfig;
use Projecten\Bakkerij\Entities\Product;
use Projecten\Bakkerij\Entities\Bestelling;
use Projecten\Bakkerij\Entities\Klant;
use Projecten\Bakkerij\Data\BestellijnDAO;
//use VDAB\Boeken\Exceptions\TitelBestaatException; 
use PDO;

class BestellingDAO {

    //waarschijnlijk overbodig
    public function getAll() {
        $sql = "select bestelId, afhaalDag, totaalPrijs, emailKlant 
            from bestelling";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        $klantDAO = new KlantDAO;
        foreach ($resultSet as $rij) {
            $klant = $klantDAO->getByEmail($rij["emailKlant"]);
            $bestelling = Bestelling::createZonderBestellijnen($rij["bestelId"], $rij["afhaalDag"], $rij["totaalPrijs"], $klant);
            array_push($lijst, $bestelling);
        }
        $dbh = null;
        return $lijst;
    }

    public function getById($bestelId) {
        $sql = "select bestelId, afhaalDag, totaalPrijs, emailklant 
            from bestelling  
            where bestelId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $bestelId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $klantDAO = new KlantDAO;
        $klant = $klantDAO->getByEmail($rij["emailklant"]);
        $bestelling = Bestelling::createZonderBestellijnen($rij["bestelId"], $rij["afhaalDag"], $rij["totaalPrijs"], $klant);
        $dbh = null;
        return $bestelling;
    }

    public function getByEmail($emailklant) {
        $sql = "select bestelId, afhaalDag, totaalPrijs, emailklant 
            from bestelling  
            where emailklant = ?";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($emailklant));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $klantDAO = new KlantDAO;
        $bestellingen = array();
        $klant = $klantDAO->getByEmail($emailklant);
        foreach ($resultSet as $rij) {
            $bestelling = Bestelling::createZonderBestellijnen($rij["bestelId"], $rij["afhaalDag"], $rij["totaalPrijs"], $klant);
            array_push($bestellingen, $bestelling);
        }
        $dbh = null;
        return $bestellingen;
    }
    
    public function slaBestellingOp($bestelling) {
        $sql = "insert bestelling set afhaalDag = :afhaaldag, totaalPrijs = :totaalprijs, emailKlant = :emailklant";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':afhaaldag' => $bestelling->getAfhaalDag(), ':totaalprijs' => $bestelling->getTotaalPrijs(),
            ':emailklant' => $bestelling->getKlant()->getEmail()));
        $dbh = null;
        $bestellijnDAO = new BestellijnDAO; 
        foreach ($bestelling->getBestelLijnen() as $bestellijn){
            $bestellijnDAO->slaOpInDatabase($bestellijn, $bestelling->getBestelId()); 
        }
    }

    
    public function deleteBestelling($bestelling) {
        $sql = "delete from bestelling where bestelId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $bestelling->getBestelId()));
        $dbh = null;
    }


}
