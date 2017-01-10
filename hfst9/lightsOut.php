<?php

class Rooster{
    private $rij; 
    private $kolom; 
    private $status; 
    // 1 is geel, 2 is rood (alfabetisch) 


    public function printImage($rij,$kolom){
        $this->rij = $rij; 
        $this->kolom = $kolom; 
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "select status from lightsout where rijnr= :rijnummer and kolomnr = :kolomnummer"; 
        $stmt = $dbh -> prepare($sql); 
        $stmt->execute(array(':rijnummer' => $rij, ':kolomnummer' => $kolom )); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $dbh = null;
        $this->status = $resultSet[0]["status"]; 
        if ($this->status == 0) {
            print("<a href=\"lightsout.php?action=klik&rij=".$rij."&kolom=".$kolom."\"><img src=\"lightsout-uit.png\" alt=\"leeg\"></a>");
        }
        elseif($this->status == 1) {
            print("<a href=\"lightsout.php?action=klik&rij=".$rij."&kolom=".$kolom."\"><img src=\"lightsout-aan.png\" alt=\"geel\"></a>");
        }
        
    }
    public function pasAan($rij,$kolom){
        if ($rij>=1 && $rij<=4 && $kolom>=1 && $kolom<=4){    
            $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
            $sql = "select status from lightsout where rijnr= :rijnummer and kolomnr = :kolomnummer"; 
            $stmt = $dbh -> prepare($sql); 
            $stmt->execute(array(':rijnummer' => $rij, ':kolomnummer' => $kolom )); 
            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $status = $resultSet[0]["status"];
            
            $sql = "update lightsout set status = :status where rijnr = :rijnummer and kolomnr = :kolomnummer"; 
            $stmt = $dbh->prepare($sql); 
            $resultSet = $stmt->execute(array(
                ':status'=> ($status +1) % 2,
                ':rijnummer'=>  $rij,
                ':kolomnummer'=>  $kolom,
                )); 
            $dbh = null;
        } 
    }
    public function nieuwSpel(){
            $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
            for ($i=1; $i<=4; $i++){
                for ($j=1; $j<=4; $j++){
                    $sql = "update lightsout set status = :status where rijnr = :rijnummer and kolomnr = :kolomnummer"; 
                    $stmt = $dbh->prepare($sql); 
                    $resultSet = $stmt->execute(array(
                        ':status'=> 0,
                        ':rijnummer'=>  $i,
                        ':kolomnummer'=>  $j,
                    )); 
                }
            }
        for ($i=1; $i<=20; $i++){
        $a = rand(1, 4); 
        $b = rand(1, 4);
        $this->onClick($a, $b); 
    }
    }
    public function onClick($rij, $kolom){
        $this->pasAan($rij,$kolom ); 
        $this->pasAan($rij+1, $kolom); 
        $this->pasAan($rij-1, $kolom); 
        $this->pasAan($rij, $kolom+1); 
        $this->pasAan($rij, $kolom-1); 
    }
    public function testUit(){
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "select status from lightsout"; 
        $stmt = $dbh -> prepare($sql); 
        $stmt->execute(); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $som = 0; 
        for ($i=0; $i<16; $i++){
            $som += $resultSet[$i]["status"];
        }
        if ($som ==0){
            header("Location: gewonnen.php"); 
        }
    }
}

if (isset($_GET["action"]) && $_GET["action"]=="klik"){
    $rooster = new Rooster; 
    $rooster->onClick($_GET["rij"], $_GET["kolom"]    ); 
    $rooster->testUit(); 
}

if (isset($_GET["action"]) && $_GET["action"]=="nieuwSpel"){
    $rooster = new Rooster; 
    $rooster->nieuwSpel(); 
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lights out!</title>
        <!--<link href="opmaakVier.css" rel="stylesheet" type="text/css">-->
    </head>
    <body>
        <h1>Lights out!</h1>
        <?php
            for($i=1; $i<=4; $i++){
                // $i = rijnummer
                for($j=1; $j<=4; $j++){
                    //$j = kolomnummer
                    $rooster = new Rooster(); 
                    $rooster->printImage($i, $j); 
                }
                ?><br><?php
            }
        ?>
                <a href="lightsout.php?action=nieuwSpel">Nieuw spel</a>
    </body>
</html>