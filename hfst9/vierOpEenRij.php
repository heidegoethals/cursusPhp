<?php
session_start(); 
if(!isset($_SESSION["kleur"])){
    $url = 'kleurKiezen.php'; 
    header("Location: $url"); 
}
$_SESSION["kleur"] = $_POST["kleur"];
print($kleur);

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vier op een rij</title>
        <!--<link href="opmaakVier.css" rel="stylesheet" type="text/css">-->
    </head>
    <body>
        



    </body>
</html>

