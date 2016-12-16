<?php

class RandomFromArray{
    public function kiesRandom($array, $aantal){
        return array_rand($array, $aantal); 
    }
    public function maakWhiteArray($aantal){
        for($i=1;$i<=$aantal;$i++){
            $array[$i]="#E0E0E0";
        }
        return $array; 
    }
    public function maakLijstZwartInArray($array, $lijst){
        foreach ($lijst as $l => $k) {
            $array[$k]="#909090";
        }
        return $array; 
    }
    public function oefening7_4() {
        $array = $this->maakWhiteArray(42);
        $lijst = $this->kiesRandom($array, 6); 
        $array2 = $this->maakLijstZwartInArray($array, $lijst); 
        return $array2; 
        
    }
}
