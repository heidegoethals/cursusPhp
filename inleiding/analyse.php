<?php
//analyse.php

class Oefening{
    public function getAnalyse($getal1, $getal2){

        if ($getal1>$getal2){
            return "Het eerste getal is groter dan het tweede"; 
        }
        elseif ($getal1<$getal2){
            return "Het eerste getal is kleiner dan het tweede"; 
        }
        elseif ($getal1=$getal2){
            return "Het eerste getal is gelijk aan het tweede"; 
        }
        else {
            return "Error"; 
        }
    }
            
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Analyse</title>
    </head>
    <body>
        <h1>
            <?php
            $oef = new Oefening(); 
            print($oef->getAnalyse(9, 25)); 
            ?>
        </h1>
    </body>
</html>
   


