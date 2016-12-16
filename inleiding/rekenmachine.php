<?php

//rekenmachine.php

class Rekenmachine {

    //kwadraat
    public function getKwadraat($getal) {
        $kwad = $getal * $getal;
        return $kwad;
    }

    //som
    public function getSom($getal1, $getal2) {
        $resultaat = $getal1 + $getal2;
        return $resultaat;
    }

    //product
    public function getProduct($getal1, $getal2) {
        $resultaat = $getal1 * $getal2;
        return $resultaat;
    }

}
?> 

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Rekenmachine</title>
        <style type="text/css"> 
            h1{color: red;}
        </style> 
    </head>
    <body>
        <h1> Som: 
<?php
$reken = new Rekenmachine();
print($reken->getSom(34, 55));
?>
        </h1>
        <h1> Product: 
<?php
$reken = new Rekenmachine();
print($reken->getProduct(34, 55));
?>
        </h1>
    </body>
</html>
