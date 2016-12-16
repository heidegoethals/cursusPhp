<?php

class GegevensBewerken{
    private $id; 
    
    public function __construct($id) {
        $this->id = $id; 
    }

    public function setTitel($titel) {
        return $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 

        $dbh = null;    
    }
    public function setDuurtijd($duurtijd) {
        return $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 

        $dbh = null;            
    }
    public function getTitel() {
        return $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 

        $dbh = null;           
    }
    public function getDuurtijd(){
        return $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd"); 

        $dbh = null;            
    }
}
