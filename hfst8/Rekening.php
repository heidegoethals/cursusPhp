<?php

abstract class Rekening {

    private static $intrest;
    private $rekeningnummer;
    private $saldo;

    public function __construct($rekeningnummer) {
        $this->rekeningnummer = $rekeningnummer;
        $this->saldo = 0;
    }

    public function stort($bedrag) {
        if ($bedrag > 0) {
            $this->saldo += $bedrag;
        } else {
            print("Het te storten bedrag moet positief zijn.");
        }
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function voerIntrestDoor() {
        $this->saldo *= (1 + $this->getIntrest());
    }

    abstract public function getIntrest();
}

class Zichtrekening extends Rekening implements Omschrijving {

    private static $intrest = 0.025;

    public function getIntrest() {
        return self::$intrest;
    }
        public function getOmschrijving(){
        return "Kortetermijnrekening";
    }

}

class Spaarrekening extends Rekening implements Omschrijving {

    private static $intrest = 0.03;

    public function getIntrest() {
        return self::$intrest;
    }
    public function getOmschrijving(){
        return "Langetermijnrekening";
    }

}

interface Omschrijving {

    public function getOmschrijving();
}
