<?php
class GegevensVerwijderen{

public function deleteFilm($id) {
    $sql = "delete from films where id = :id"; 
    $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8","cursusgebruiker", "cursuspwd"); 
    $stmt = $dbh->prepare($sql); 
    $stmt->execute(array(':id' => $id)); 
    $dbh = null; 
    
}
}

