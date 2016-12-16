<?php
//fibonacci.php

class Main{
    public function fibonacci($getal1, $getal2, $max){
        print($getal1);
        print('<br>');
        print($getal2);
        print('<br>');
        while ($getal2<= $max){
            $temp = $getal1;
            $getal1 = $getal2;
            $getal2 = $temp + $getal1; 
            print($getal2);
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
            print($main->fibonacci(0,1,5000)); 
            ?>
        </h1>
    </body>
</html>
   

