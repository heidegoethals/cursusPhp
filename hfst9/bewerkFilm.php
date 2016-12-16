<?php
require_once 'Film.php';
$id = $_GET["id"]; 
$film = new Film($id); 
$titel = $film->getTitel(); 
$duurtijd = $film->getDuurtijd(); 
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Film bewerken</title>
    </head>
    <body>
        <h1>Gegevens aanpassen</h1>
        <form action="films.php?action=bewerk&amp;id=<?php print($id); ?>" method="post">
            
            Titel: <input type="text" name="titel" value="<?php print($titel);?>"><br>
            Duurtijd: <input type="text" name="duurtijd" value="<?php print($duurtijd); ?>"><br>
            <input type="submit" value="Pas aan">
        </form>
    </body>
</html>

