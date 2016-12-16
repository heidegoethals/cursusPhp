<?php
session_start(); 
if (!isset($_SESSION["teller"])){$_SESSION["teller"] = 0;}
class Main{
    public function aanroep(){
        $_SESSION["teller"]++; 
    }
    public function aantal(){
        return $_SESSION["teller"];
    }
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Teller</title>
    </head>
    <body>
        <?php
            $main = new Main; 
            $main->aanroep(); 
            print($main->aantal()); 
            
        ?>
    </body>
</html>