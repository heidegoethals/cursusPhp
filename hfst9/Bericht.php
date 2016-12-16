<?php

class Bericht{
    private $auteur; 
    private $boodschap; 
    private $datum; 
    
    public function __construct() {}
    
    public static function metId($id){
        $instance = new self(); 
        $instance->laadVanDb($id); 
        return $instance; 
    }
    protected function laadVanDb($id) {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "select auteur, boodschap, datum from gastenboek where id= :id"; 
        $stmt = $dbh -> prepare($sql); 
        $stmt->execute(array(':id' => $id)); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $dbh = null;    
        $this->auteur = $resultSet[0]["auteur"]; 
        $this->boodschap = $resultSet[0]["boodschap"]; 
        $this->datum = $resultSet[0]["datum"];   
    }
    
    public static function metGegevens($auteur, $boodschap, $datum){
        $instance = new self();
        $instance->auteur = $auteur; 
        $instance->boodschap = $boodschap; 
        $instance->datum = $datum;
        return $instance; 
    }
    
    public function getAuteur() {
        return $this->auteur; 
    }
    public function getBoodschap() {
        return $this->boodschap; 
    }
    public function getDatum() {
        return $this->datum; 
    }
    public function voegToeAanDb(){
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "insert into gastenboek (auteur, boodschap, datum) values (:auteur, :boodschap, :datum)"; 
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':auteur' => $this->auteur, ':boodschap' => $this->boodschap, ':datum' => $this->datum)); 
        $dbh = null; 
    }
    public function printBericht(){
        print("<dt><strong>Auteur: </strong>" . $this->auteur . "</dt>
            <dd>". $this->boodschap ."</dd>"); 
    }

    
}
