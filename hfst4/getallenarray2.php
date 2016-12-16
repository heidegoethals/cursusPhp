<?php

class Main{
    public function getArray($min, $aantal){
        $tab[0]=0;
        for($i=1;$i<$aantal;$i++){
            $tab[$i]=$tab[$i-1]+$i; 
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
        print_r($main->getArray(0,50)); 
        ?>
        </pre>
    </body>   
</html>