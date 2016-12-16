<?php

class SeizoenenOpslaan {
    public function opslaan(){
        $seizoenen = array();
        array_push($seizoenen, "lente");
        array_push($seizoenen, "zomer");
        array_push($seizoenen, "herfst");
        array_push($seizoenen, "winter"); 
        return $seizoenen;
                
    }
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Seizoenen</title>
    </head>
    <body>
        <pre>
            <?php
            $seizoenen = new SeizoenenOpslaan(); 
            print_r($seizoenen->opslaan()); 
            ?>
        </pre>
    </body>
</html>