<?php

namespace Projecten\Bakkerij\Entities; 

use Projecten\Bakkerij\Entities\Product; 

class BestelLijn {
    private $product; 
    private $aantal; 
    
    function __construct($product, $aantal) {
        $this->product = $product;
        $this->aantal = $aantal;
    }
    function getProduct() {
        return $this->product;
    }

    function getAantal() {
        return $this->aantal;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    function setAantal($aantal) {
        $this->aantal = $aantal;
    }

    function getTotaalPrijs() {
        return $this->product->getPrijs() * $this->aantal;
    }
}