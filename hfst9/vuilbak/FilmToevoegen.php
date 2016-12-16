<?php

class FilmToevoegen{
    public function voegToe($titel,$duurtijd) {
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