<?php

require_once 'Film.php';
require_once 'Verzameling.php';

if (isset($_GET["action"]) && $_GET["action"] == "verwijder"){
    $verwijder = new Film($_GET["id"]); 
    $verwijder->deleteFilm();
}
elseif (isset($_GET["action"]) && $_GET["action"] == "bewerk"){
    $bewerk = new Film($_GET["id"]); 
    $bewerk->setTitel($_POST["titel"]);
    $bewerk->setDuurtijd($_POST["duurtijd"]);
}

elseif (isset($_GET["action"]) && $_GET["action"] == "voegtoe"){
    if(isset($_POST["titel"]) && isset($_POST["duurtijd"])){
    $toevoegen = new Verzameling(); 
    $toevoegen->voegFilmToe($_POST["titel"],$_POST["duurtijd"]);
    }
}

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Films</title>
    </head>
    <body>
        <h1>Alle films</h1>
        <?php 
            $opvragen= new Verzameling(); 
            $lijst=$opvragen->filmsOphalen(); 
            foreach($lijst as $rij){
                print($rij); 
            }
        ?>
        
        <h1>Film toevoegen</h1>
   
        <form action="films.php?action=voegtoe" method="post">
            Titel: <input type="text" name="titel"><br>
            Duurtijd: <input type="text" name="duurtijd"> minuten <br>
            <input type="submit" value="Toevoegen">
        </form>

    </body>
</html>