<?php

class NegatieveStortingException extends Exception{
}

class RekeningVolException extends Exception{
}

class BedragTeGrootException extends Exception{
}

class Rekening {
    private $saldo; 
    
    public function __construct() {
        $this->saldo = 0;
    }
    
    public function storten($bedrag){
        if ($bedrag < 0){
            throw new NegatieveStortingException(); 
        }
        if ($this->saldo + $bedrag > 1000){
            throw new RekeningVolException(); 
        }
        if ($bedrag>500){
            throw new BedragTeGrootException(); 
        }
        $this->saldo += $bedrag; 
    }
    
    public function getSaldo(){
        return $this->saldo; 
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Fouten afhandelen</title>
    </head>
    <body>
        <?php
        $rek = new Rekening(); 
        try {
            print('<p>Saldo: &euro;'. $rek->getSaldo() .  ' </p>'); 
            $rek->storten(200); 
            $rek->storten(500); 
            $rek->storten(500); 
            print('<p>Saldo: &euro;'. $rek->getSaldo() .  ' </p>'); 
        } catch (NegatieveStortingException $ex) {
            print('<p>Een negatief bedrag storten is niet mogelijk!</p>'); 
            print('<p>Saldo: &euro;' . $rek->getSaldo(). '  </p>'); 
        } catch (RekeningVolException $ex){
            print('<p>Dit bedrag kan niet gestort worden, de limiet van de rekening is &euro;1000!</p>'); 
            print('<p>Saldo: &euro;'. $rek->getSaldo()." </p>"); 
        } catch (BedragTeGrootException $ex){
            print('<p>Dit bedrag kan niet gestort worden, de limiet van het bedrag is  &euro;500!</p>'); 
            print('<p>Saldo: &euro;'. $rek->getSaldo()." </p>"); 
        }
        ?>
    </body>
</html>