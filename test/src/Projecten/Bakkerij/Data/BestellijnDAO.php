<?php
namespace Projecten\Bakkerij\Data; 

use Projecten\Bakkerij\Data\DBConfig; 
use Projecten\Bakkerij\Entities\Product; 
use Projecten\Bakkerij\Entities\Bestelling; 
use Projecten\Bakkerij\Entities\Klant; 
use Projecten\Bakkerij\Entities\BestelLijn; 
use PDO; 


class BestellijnDAO {

    //overbodig? 
    public function addAllToBestellingen($bestellingDAO) {
        $sql = "select bestelId, productId, aantal
            from bestellijnen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        $productDAO = new ProductDAO; 

        foreach ($resultSet as $rij) {
            $product = $productDAO->getById($rij["productId"]);
            $bestellijn = new BestelLijn($product, $rij["aantal"]); 
            $bestelling = $bestellingDAO->getById($rij["bestelId"]); 
            $bestelling->addBestelLijn($bestellijn); 
        }
        $dbh = null;
    }

    public function addByBestelIdToBestellingen($bestelId) {
        $sql = "select bestelId, productId, aantal
            from bestellijnen
            where bestelId = ?";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($bestelId));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $bestellijnen = array();
        $productDAO = new ProductDAO; 
        $bestellingDAO = new BestellingDAO; 

        foreach ($resultSet as $rij) {
            $product = $productDAO->getById($rij["productId"]);
            $bestellijn = new BestelLijn($product, $rij["aantal"]); 
            $bestelling = $bestellingDAO->getById($rij["bestelId"]); 
            $bestelling->addBestelLijn($bestellijn);         
        }
        $dbh = null;
   }
   
   public function slaOpInDatabase($bestellijn, $bestelId) {
       $sql = "insert bestellijnen set bestelId = :bestelid, productId = :productid, aantal = :aantal";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':bestelid' => $bestelId, ':productid' => $bestellijn->getProduct()->getProductId(),
            ':aantal' => $bestellijn->getAantal()));
        $dbh = null;
   }
    
}