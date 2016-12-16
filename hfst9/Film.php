<?php
class Film{
    private $id; 
    
    public function __construct($id) {
        $this->id=$id;
    }
    
    public function deleteFilm() {
        $sql = "delete from films where id = :id"; 
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8","cursusgebruiker", "cursuspwd"); 
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':id' => $this->id)); 
        $dbh = null; 
    }

    public function setTitel($titel) {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "update films set titel = :titel where id = :id"; 
        $stmt = $dbh->prepare($sql); 
        $resultSet = $stmt->execute(array(
            ':titel' => $titel,
            ':id' => $this->id
        ));
        
        $dbh = null;    
    }
    public function setDuurtijd($duurtijd) {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "update films set duurtijd = :duurtijd where id = :id"; 
        $stmt = $dbh->prepare($sql); 
        $resultSet = $stmt->execute(array(
            ':duurtijd' => $duurtijd,
            ':id' => $this->id
        ));
        $dbh = null;            
    }
    public function getTitel() {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "select titel from films where id = :id"; 
        $stmt = $dbh -> prepare($sql); 
        $stmt->execute(array(':id' => $this->id)); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $dbh = null;    
        $titel = $resultSet[0]["titel"]; 
        return $titel; 
    }
    public function getDuurtijd(){
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "select duurtijd from films where id = :id"; 
        $stmt = $dbh -> prepare($sql); 
        $stmt->execute(array(':id' => $this->id)); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        $dbh = null; 
        $duurtijd = $resultSet[0]["duurtijd"]; 
        return $duurtijd; 
        
    }
}