<?php
session_start(); 
if(isset($_POST["kleur"])){
    $_SESSION["kleur"] = $_POST["kleur"];
}

if(!isset($_SESSION["kleur"])){
    $url = 'kleurKiezen.php'; 
    header("Location: $url"); 
}
if (isset($_GET["action"]) && isset($_GET["action"])=="klik"){
    $rooster = new Rooster; 
    $rooster->klik($_GET["rij"], $_GET["kolom"]); 
}
class Rooster{
    private $rij; 
    private $kolom; 
    private $status; 
    // 1 is geel, 2 is rood (alfabetisch) 


    public function printImage($rij,$kolom){
        $this->rij = $rij; 
        $this->kolom = $kolom; 
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "select status from vieropeenrij_spelbord where rijnummer= :rijnummer and kolomnummer = :kolomnummer"; 
        $stmt = $dbh -> prepare($sql); 
        $stmt->execute(array(':rijnummer' => $rij, ':kolomnummer' => $kolom )); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $dbh = null;
        $this->status = $resultSet[0]["status"]; 
        if ($this->status == 0) {
            print("<a href=\"vierOpEenRij.php?action=klik&rij=".$rij."&kolom=".$kolom."\"><img src=\"emptyslot.png\" alt=\"leeg\"></a>");
        }
        elseif($this->status == 1) {
            print("<a href=\"vierOpEenRij.php?action=klik&rij=".$rij."&kolom=".$kolom."\"><img src=\"yellowslot.png\" alt=\"geel\"></a>");
        }
        elseif($this->status == 2) {
            print("<a href=\"vierOpEenRij.php?action=klik&rij=".$rij."&kolom=".$kolom."\"><img src=\"redslot.png\" alt=\"rood\"></a>");
        }
    }
    public function klik($rij,$kolom){
        for ($i=6; $i>=1; $i--){
            $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
            $sql = "select status from vieropeenrij_spelbord where rijnummer= :rijnummer and kolomnummer = :kolomnummer"; 
            $stmt = $dbh -> prepare($sql); 
            $stmt->execute(array(':rijnummer' => $i, ':kolomnummer' => $kolom )); 
            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $status = $resultSet[0]["status"];
            if ($status ==0){
                
                $sql = "update vieropeenrij_spelbord set status = :status where rijnummer = :rijnummer and kolomnummer = :kolomnummer"; 
                $stmt = $dbh->prepare($sql); 
                $resultSet = $stmt->execute(array(
                    ':status'=> $_SESSION["kleur"],
                    ':rijnummer'=>  $i,
                    ':kolomnummer'=>  $kolom,
                    )); 
                $i = 0; 
            }
        
            $dbh = null;
        }
         
    }
}

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vier op een rij</title>
        <!--<link href="opmaakVier.css" rel="stylesheet" type="text/css">-->
    </head>
    <body>
        <h1>Vier op een rij</h1>
        <?php
            for($i=1; $i<=6; $i++){
                // $i = rijnummer
                for($j=1; $j<=7; $j++){
                    //$j = kolomnummer
                    $rooster = new Rooster(); 
                    $rooster->printImage($i, $j); 
                }
                ?><br><?php
            }
        ?>
    </body>
</html>

