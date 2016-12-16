<?php
class Main{
    public function som($getal1, $getal2){
        return $getal1+$getal2;
    }
    public function verschil($getal1, $getal2){
        return $getal1-$getal2;
    }
    public function product($getal1, $getal2){
        return $getal1*$getal2;
    }
    public function quotient($getal1, $getal2){
        return $getal1/$getal2;
    }    
    public function bewerking($getal1, $getal2, $bewerking){
        switch($bewerking){
            case "som":
                return $this->som($getal1, $getal2);
            break; 
            case "verschil": 
                return $this->verschil($getal1, $getal2);
            break; 
            case "product": 
                return $this->product($getal1, $getal2);
            break; 
            case "quotient": 
                return $this->quotient($getal1, $getal2);
            break; 
        }
    }         
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gebruikersinvoer</title>
    </head>
    <body>
        <h1>
            <?php
            print("De ". $_GET["bewerking"]. " van ". $_GET["getal1"]. " en ". $_GET["getal2"]. " is "); 
            $main = new Main; 
            print($main -> bewerking($_GET["getal1"],$_GET["getal2"], $_GET["bewerking"])); 
            ?>
        </h1>

    </body>
</html>
