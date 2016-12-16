<?php
require_once('Main.php');


?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Deurenspel</title>
    </head>
    <body>
        <?php
        $main = new Main; 
        if (!isset($_SESSION["deurSchat"])){$main->beginSpel();} 
        if ((isset($_GET["klik"]))){
            if ($_GET["klik"]==0){
                $main->beginSpel();
            }
            elseif  ($_SESSION["gewonnen"]==0){
                $main->klikDeur($_GET["klik"]);
            }
        }
        for($i=1; $i<=7; $i++){
            ?>
        
        <a href="deurenSpel.php?klik=<?php print($i);?>"><img src="img/door<?php print($_SESSION["deur"][$i]);?>.png"></a>
        
            
        <?php } ?>
        <a href="deurenSpel.php?klik=0">Klik hier om een nieuw spel te starten. </a>
    </body>
</html>