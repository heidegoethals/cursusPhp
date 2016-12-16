<?php
require_once 'ChatBericht.php';
// sla bericht op als het toegevoegd is
session_start(); 
//if(!isset($_SESSION["nickname"])){
//$_SESSION["nickname"]= "p".rand(111,999); 
//}


if(isset($_GET["action"]) && $_GET["action"]=="voegtoe"){
   $bericht = Bericht::metGegevens($_SESSION["nickname"],$_POST["boodschap"],date("Y-m-d G:i:s"));
   $bericht->voegToeAanDb(); 
}
if(isset($_GET["action"]) && $_GET["action"]=="nieuweNickname"){
    $_SESSION["nickname"]=$_POST["nickname"]; 
}
if(!isset($_SESSION["nickname"])){
    $url = 'kiesNickname.php'; 
    header("Location: $url"); 
}

// laad de berichten 
$lijst = array(); 
$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
$sql = "select id from chatberichten"; 
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

?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Chat</title>
        <link href="opmaakChat.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Berichten</h1>
        <ul>
            <?php
            $i=0; 
            foreach($lijst as $bericht){
                if ($i<20){
                $bericht->printBericht();
                $i++;
                }              
            }                
            ?>
        </ul>
        
        <form action="chat.php?action=voegtoe" method="post" id="berichtToevoegen">
            Bericht: <br>
                    <textarea name="boodschap" form="berichtToevoegen" style="width:100%; font-family: inherit; "></textarea><br>
            <input type="submit" value="Versturen">
        </form>


    </body>
</html>


