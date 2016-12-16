<?php

class FilmsOpvragen{
public function filmsOphalen() {
    $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
    $stmt = $dbh->query("select * from films"); 
    $dbh = null; 
    $lijst = array(); 
    foreach($stmt as $rij){
        $printRij = "<li>"
                . $rij["titel"] . " (" . $rij["duurtijd"] . " min) "
                . "<a href=\"films.php?action=verwijder&id=" . $rij["id"] 
                    . "\"><img src=\"delete.png\" alt=\"Verwijder film\"/></a>"
                . "<a href=\"bewerkFilm.php?action=bewerk&id=" . $rij["id"] 
                    . "\"><img src=\"bewerk.png\" alt=\"Pas gegevens aan\" height=12px/></a></li>"
                ; 
        array_push($lijst, $printRij); 
    }
    return $lijst; 
}
}