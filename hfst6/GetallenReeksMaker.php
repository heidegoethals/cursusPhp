<?php
class GetallenReeksMaker{
    public function getReeks(){
        $array = $this->getRandomReeks(10, 1, 100); 
        asort($array); 
        return $array; 
    }
    
    public function getRandomReeks($n,$min,$max){
        $tabel = array(); 
        for($i=0;$i<$n;$i++){
            $tabel[$i]= rand($min,$max); 
        }
        return $tabel; 
    }

            
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

