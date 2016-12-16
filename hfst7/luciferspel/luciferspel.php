<?php
session_start();

class Main{
    public function startSpel(){
        $_SESSION["hoop"][1]=7; 
        $_SESSION["hoop"][2]=6;
        $_SESSION["hoop"][3]=8; 
        $_SESSION["hoop"][4]=5; 
    } 
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Luciferspel</title>
    </head>
    <body>
        <?php 
            $main = new Main; 
            if(empty($_SESSION["hoop"])){
            $main->startSpel(); }
            if(isset($_POST["nieuwSpel"])){
            $main->startSpel(); }
            
            for($j=1; $j<=8;$j++) {
            if(isset($_POST["knop$j"])){
                
                if($j>4){
                    
                    $_SESSION["hoop"][(($j-1)%4)+1]-=2; 
                }
                else{
                    $_SESSION["hoop"][(($j-1)%4)+1]-=1;
                }
               
            }}
            for($j=1; $j<=4; $j++){
            
            for($i=1; $i<=$_SESSION["hoop"][$j]; $i++){
                ?> 
        <img src="lucifer.png">
                <?php
            }
            ?>
        <form method="post" action="luciferspel.php">
        <input type="submit" name="knop<?php print($j); ?>" value="Verwijder 1 lucifer"/>  
        <input type="submit" name="knop<?php print(4+$j); ?>" value="Verwijder 2 lucifers"/> 
        </form>
        <br>
            <?php
            }
            
        
        ?> 
        <form method="post" action="luciferspel.php">
        <input type="submit" name="nieuwSpel" value="Nieuw spel"/> 
        </form>
    </body>
</html>