<?php
//switch.php

class Main{
    public function schrijf($getal){
        if ($getal==1){return 'Een'; }
        elseif ($getal==2){return 'Twee'; }
        elseif ($getal==3){return 'Drie'; }
        elseif ($getal==4){return 'Vier'; }
        elseif ($getal==5){return 'Vijf'; }
        else {return $getal; } 
        
        
        
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
            print($main->schrijf(4)); 
            ?>
        </h1>
    </body>
</html>
   