<?php
if(isset($_GET["kleur"])){
    setcookie("kleur", $_GET["kleur"], time()+ 86400); 
    $kleur= $_GET["kleur"];    
} else{
    $kleur="white";
    if (isset($_COOKIE["kleur"])){
        $kleur = $_COOKIE["kleur"]; 
    }
}




?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kleur</title>
        <style>
            body{
                background: <?php print($kleur); ?>;
            }
            form{
                display: inline; 
            }
            select{
                display: inline; 
            }

        </style>          
    </head>
    <body>
        Kies uw favoriete achtergrondkleur:
        <form action="kleur.php" method="get">
        <select name="kleur">
            <option value="red">Rood</option>
            <option value="blue">Blauw</option>
            <option value="green">Groen</option>
            <option value="yellow">Geel</option>
            <option value="white">Wit</option>
        </select>    
            <input type="submit" value="OK">
            <br>
            <a href="kleur.php">Pagina vernieuwen</a>
            
    </body>
</html>