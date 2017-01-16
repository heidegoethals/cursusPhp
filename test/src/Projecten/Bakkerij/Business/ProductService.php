<?php

namespace Projecten\Bakkerij\Business;

use Projecten\Bakkerij\Entities\Product;
use Projecten\Bakkerij\Data\ProductDAO;

class ProductService {
    
    public function getProducten() {
        $productDAO = new ProductDAO; 
        $producten = $productDAO->getAll(); 
        return $producten; 
    }
}

