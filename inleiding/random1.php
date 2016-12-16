<?php
//random1.php

class Main{
    public function stappen($getal1, $getal2, $stap){
        while ($getal1<= $getal2){
            print($getal1); 
            print('<br>'); 
            $getal1 = $getal1 + $stap; 
        }
            
    }
    public function random($min, $max){
        return rand($min, $max); 
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
            $main = new Main(); 
            print($main->stappen(1,$main->random(10,20),1)); 
            ?>
        </h1>
    </body>
</html>
   

