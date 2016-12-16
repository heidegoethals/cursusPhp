<?php

class Verzameling{
    
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
                . "<a href=\"bewerkFilm.php?id=" . $rij["id"] 
                    . "\"><img src=\"bewerk.png\" alt=\"Pas gegevens aan\" height=12px/></a></li>"
                ; 
            array_push($lijst, $printRij); 
        }
        return $lijst; 
    }

    public function voegFilmToe($titel,$duurtijd) {
        if(!is_numeric($duurtijd)){
            print("De duurtijd moet een getal zijn.");
        }
        elseif($duurtijd<=0){
            print("De duurtijd moet groter dan 0 zijn.");
        }
        else{
            $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
            $sql = "insert into films (titel, duurtijd) values (:titel, :duurtijd)"; 
            $stmt = $dbh->prepare($sql); 
            $stmt->execute(array(':titel' => $titel, ':duurtijd' => $duurtijd)); 
            $dbh = null; 
        }
    }

}