<?php

class Bericht{
    private $nickname; 
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
        $sql = "select nickname, boodschap, datum from chatberichten where id= :id"; 
        $stmt = $dbh -> prepare($sql); 
        $stmt->execute(array(':id' => $id)); 
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $dbh = null;    
        $this->nickname = $resultSet[0]["nickname"]; 
        $this->boodschap = $resultSet[0]["boodschap"]; 
        $this->datum = $resultSet[0]["datum"];   
    }
    
    public static function metGegevens($nickname, $boodschap, $datum){
        $instance = new self();
        $instance->nickname = $nickname; 
        $instance->boodschap = $boodschap; 
        $instance->datum = $datum;
        return $instance; 
    }
    
    public function getNickname() {
        return $this->nickname; 
    }
    public function getBoodschap() {
        return $this->boodschap; 
    }
    public function getDatum() {
        return $this->datum; 
    }
    public function voegToeAanDb(){
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 
        $sql = "insert into chatberichten (nickname, boodschap, datum) values (:nickname, :boodschap, :datum)"; 
        $stmt = $dbh->prepare($sql); 
        $stmt->execute(array(':nickname' => $this->nickname, ':boodschap' => $this->boodschap, ':datum' => $this->datum)); 
        $dbh = null; 
    }
    public function printBericht(){
        print("<li>" . $this->nickname . '> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp' . $this->boodschap ."</li>"); 
    }

    
}
