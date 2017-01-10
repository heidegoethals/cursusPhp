<?php

namespace Projecten\Bakkerij\Entities; 

class Product {
    private static $productMap = array(); 
    private $productId; 
    private $naam; 
    private $prijs; 
    
    private function __construct($productId, $naam, $prijs) {
        $this->productId = $productId;
        $this->naam = $naam;
        $this->prijs = $prijs;
    }
    
    public static function create($productId, $naam, $prijs) {
        if (!isset(self::$productMap[$productId])) {
            self::$productMap[$productId] = new Product($productId, $naam, $prijs);
        }        
        return self::$productMap[$productId];
    }
    
    function getProductId() {
        return $this->productId;
    }

    function getNaam() {
        return $this->naam;
    }

    function getPrijs() {
        return $this->prijs;
    }

    function setNaam($naam) {
        $this->naam = $naam;
    }

    function setPrijs($prijs) {
        $this->prijs = $prijs;
    }


            
            
            
}