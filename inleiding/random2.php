<?php
//random2.php

class Main{
    public function randomGetallen(){
        $getal1= 0;
        while ($getal1<= 600){
            $getal1 = rand(1, 1000);
            print($getal1); 
            print('<br>'); 
            
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
            $main = new Main(); 
            print($main->randomGetallen()); 
            ?>
        </h1>
    </body>
</html>
   

