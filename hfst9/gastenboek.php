<?php
require_once 'Bericht.php';
// sla bericht op als het toegevoegd is
if(isset($_GET["action"]) && $_GET["action"]=="voegtoe"){
   $bericht = Bericht::metGegevens($_POST["auteur"],$_POST["boodschap"],date("Y-m-d G:i:s"));
   $bericht->voegToeAanDb(); 
}


// laad de berichten 
$lijst = array(); 
$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
$sql = "select id from gastenboek"; 
$stmt = $dbh -> prepare($sql); 
$stmt->execute(); 
$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
$dbh = null;    
foreach ($resultSet as $rij) {
    $id = $rij["id"]; 
    $lijst[] = Bericht::metId($id); 
}
//lijst sorteren
function cb($a, $b){
    return strtotime($a->getDatum()) - strtotime($b->getDatum());
}
usort($lijst, 'cb');
$lijst = array_reverse($lijst); 

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gastenboek</title>
        <link href="opmaak.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Berichten</h1>
        <dl>
            <?php
            foreach($lijst as $bericht){
                $bericht->printBericht();
            }                
            ?>
        </dl>
        
        <h1>Bericht toevoegen</h1>
        <form action="gastenboek.php?action=voegtoe" method="post">
            Auteur: <input type="text" name="auteur"><br>
            Boodschap: <input type="text" name="boodschap"><br>
            <input type="submit" value="Verzenden">
        </form>
        

    </body>
</html>

