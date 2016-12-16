<?php

require_once 'ModuleLijst.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Zoekresultaat</title>
    </head>
    <body>
        <h1>Zoekresultaat</h1>
        <?php 
        
        $mod = new ModuleLijst($_GET["minPrijs"],$_GET["maxPrijs"]);
        $lijst = $mod->oefening9_1(); 
        foreach($lijst as $rij){
            print("<li>".$rij."</li>");
        }
        ?>

    </body>
</html>