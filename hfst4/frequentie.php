<?php

class Main{
    public function frequentie(){
        return $this->frequentieIni(1,40,100); 
    }
    public function frequentieIni($min, $max, $aantal){
        $tab = array(); 
        for ($i=$min; $i<=$max; $i++){
            $tab[$i]=0; 
        }
        for ($i=0; $i < $aantal; $i++){
            $getal=rand($min, $max); 
            $tab[$getal]+=1; 
        }
        return $tab;
    }
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Frequenties</title>
    </head>
    <body>
        <pre>
        <?php
        $main = new Main; 
        $tabel=$main->frequentie(); 
        foreach ($tabel as $getal=>$freq){
            print("<li> Getal ");
            print($getal); 
            print(" werd ");
            print($freq);
            print(" keer gegenereerd.</li>"); 
            
            
        }
        ?>
        </pre>
    </body>
</html>
