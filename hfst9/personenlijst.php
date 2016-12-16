<?php
//personenlijst.php

class PersonenLijst {

 public function getLijst() {
  $lijst = array(); 
  $dbh = new PDO("mysql:host=localhost;dbname=cursusphp","cursusgebruiker","cursuspwd");
  $dbh = null;
 }
 
}
?>


<!DOCTYPE HTML>
<html>
 <head>
  <meta charset=utf-8>
  <title>Databanken introductie</title>
 </head>
 <body>
  <?php
  $pl = new PersonenLijst();
  $pl->getLijst();
  ?>
 </body>
</html> 
  