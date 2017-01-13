<?php
namespace Projecten\Bakkerij\Data; 

use Projecten\Bakkerij\Data\DBConfig; 
use Projecten\Bakkerij\Entities\Product; 
//use VDAB\Boeken\Exceptions\TitelBestaatException; 
use PDO; 

class ProductDAO {
    public function getAll() {
        $sql = "select productId, naam, prijs 
            from product";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $product = Product::create($rij["productId"], $rij["naam"], $rij["prijs"]);
            array_push($lijst, $product);
        }
        $dbh = null;
        return $lijst;
    }

    public function getById($id) {
        $sql = "select productId, naam, prijs 
            from product  
            where productId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);

        $product = Product::create($rij["productId"], $rij["naam"], $rij["prijs"]);
        $dbh = null;
        return $product;
    }

}
