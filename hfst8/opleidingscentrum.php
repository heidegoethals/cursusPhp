<?php


class Persoon {

    protected $voornaam = '';
    protected $familienaam = '';

    public function setVoornaam($naam) {
        $this->voornaam = $naam;
    }

    public function setFamilienaam($naam) {
        $this->familienaam = $naam;
    }

    public function getVollNaam() {
        return($this->familienaam . ', ' . $this->voornaam);
    }

}

class Cursist extends Persoon {

    private $aantalCursussen = 0;

    public function getAantalCursussen() {
        return $this->aantalCursussen; 
    }

    public function __construct($familienaam, $voornaam, $aantalCursussen) {
        $this->familienaam = $familienaam;
        $this->voornaam = $voornaam;
        $this->aantalCursussen = $aantalCursussen;
    }

}

class Medewerker extends Persoon {
    private $aantalCursisten = 0; 
    public function __construct($familienaam, $voornaam, $aantalCursisten) {
        $this->familienaam = $familienaam; 
        $this->voornaam = $voornaam; 
        $this->aantalCursisten = $aantalCursisten; 
    }
    public function getAantalCursisten() {
        return $this->aantalCursisten; 
    }

}
