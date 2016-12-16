<?php
session_start(); 

class Random{
    public function getRandom($min, $max){
        if (!isset($_SESSION["random"])){
            $_SESSION["random"] = rand($min,$max); 
        }
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