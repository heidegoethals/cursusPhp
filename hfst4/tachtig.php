<?php

class Main {
    public function genereerGetallen($min, $max, $stop){
        $tab = array();
        $getal = $stop -1; 
        while($getal<$stop){
            $getal = rand($min, $max);
            array_push($tab,$getal);
        }
        return $tab; 
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tachtig</title>
    </head>
    <body>
        <pre>
        <?php 
        $main = new Main;
        print_r($main->genereerGetallen(1, 100, 99)); 
        ?>
        </pre>
    </body>
</html>