<?php

class Main{
    public function getArray($min, $max, $aantal){
        $tab = array();
        for ($i=0; $i < $aantal; $i++){
            $tab[$i]=rand($min,$max); 
        }   
        return $tab;
            
    }
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Getallen-array</title>
    </head>
    <body>
        <pre>
        <?php
        $main = new Main;
        print_r($main->getArray(-50,50,20)); 
        ?>
        </pre>
    </body>   
</html>