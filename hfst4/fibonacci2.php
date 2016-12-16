<?php

class Main{
    public function getArray($min, $aantal){
        $tab[0]=0;
        $tab[1]=1; 
        for ($i=2; $i<$aantal; $i++){
            $tab[$i]=$tab[$i-1]+ $tab[$i-2]; 
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
        print_r($main->getArray(0,30)); 
        ?>
        </pre>
    </body>   
</html>