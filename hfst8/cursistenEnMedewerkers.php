<?php
require_once 'opleidingscentrum.php';
$cursist = new Cursist("Peeters", "Jan", 3);
 $medewerker = new Medewerker("Janssens", "Tom", 8);
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset=utf-8>
  <title>Cursisten en medewerkers</title>
 </head>
 <body>
  <h1>Namen</h1>
  <ul> 
   <li><?php print($cursist->getVollNaam() . " volgt " . 
    $cursist->getAantalCursussen() . " cursus(sen)");?></li> 
   <li><?php print($medewerker->getVollNaam() . " begeleidt " . 
    $medewerker->getAantalCursisten() .  
    " cursist(en)");?></li>
  </ul>
 </body>
</html> 