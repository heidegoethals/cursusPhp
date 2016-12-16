<?php
session_start(); 

class Main{
    public function beginSpel() {
        $_SESSION["deurSchat"] = rand(1,7);        
        for($i=1; $i<=7;$i++){
            $_SESSION["deur"][$i]="closed"; 
            $_SESSION["gewonnen"]=0;
        }
    }
    public function klikDeur($n){
        if ($n == $_SESSION["deurSchat"]){
            $_SESSION["deur"][$n]="treasure"; 
            $_SESSION["gewonnen"]=1;
            
        }
        else {
            $_SESSION["deur"][$n]="open"; 
        }
    }


}