<?php
session_start(); 
if (!isset($_SESSION["aantal"])){$_SESSION["aantal"] = 0;}
class Random{
    public function getRandom($min, $max){
        if (!isset($_SESSION["random"]) OR $_SESSION["aantal"]>=10){
            $_SESSION["random"] = rand($min,$max); 
            $_SESSION["aantal"] = 0; 
        }
        $_SESSION["aantal"]++; 
        return $_SESSION["random"];
    }
    
    public function getRandomIni(){
        return $this->getRandom(1, 100);
    }
}


?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Random met opslag</title>
    </head>
    <body>
        <?php
            $random = new Random; 
            print($random->getRandomIni()); 
            
        ?>
    </body>
</html>