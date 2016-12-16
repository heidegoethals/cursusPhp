<?php
//gok.php
class Main{
    public function random(){
        return rand(1, 10); 
    }
    public function gok($getal){
        $random = $this->random(); 
        if ($getal == $random){
            print("Proficiat, juist geraden!");            
        }
        else{
            print("Fout, probeer opnieuw!"); 
        }
        
        
            print("<br>"); 
            print("Jouw gok: ". $getal); 
            print("<br>"); 
            print("De uitkomst: ". $random); 
                
    }
            
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gebruikersinvoer</title>
    </head>
    <body>
        <h1>
            <?php
            $main = new Main; 
            $main -> gok($_GET["gok"]); 
            ?>
        </h1>

    </body>
</html>