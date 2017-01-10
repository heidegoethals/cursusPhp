<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Projecten\Bakkerij\Entities\Klant; 
use Projecten\Bakkerij\Entities\Product; 
use Projecten\Bakkerij\Entities\Bestelling; 
use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

$classLoader = new ClassLoader("Projecten", "src"); 
$classLoader->register();  

print('<h1>Tests</h1>');
print('<h2>Klant</h2>');

$klant = Klant::create('test@mail.be', 'test', 'Bert', 'Mortier', 'Apenstraat', '16', '8512', 'Wondergem'); 
print($klant->getEmail()); 
print('<br>'); 
print($klant->getWachtwoord()); 
print('<br>'); 
print($klant->getNaam()); 
print('<br>'); 
print($klant->getVoornaam()); 
print('<br>'); 
print($klant->getStraat()); 
print('<br>'); 
print($klant->getHuisnr()); 
print('<br>'); 
print($klant->getPostcode()); 
print('<br>'); 
print($klant->getGemeente()); 
print('<br>'); 
print($klant->getGeblokkeerd()); 



print('<h2>Product</h2>');

$product = Product::create(1,'Wit brood', 2.10); 
print($product->getProductId()); 
print('<br>'); 
print($product->getNaam()); 
print('<br>'); 
print($product->getPrijs()); 
print('<br>');
print('<br>'); 
print('<br>'); 


$product = Product::create(1,'Bruin brood', 3.10); 
print($product->getProductId()); 
print('<br>'); 
print($product->getNaam()); 
print('<br>'); 
print($product->getPrijs()); 
print('<br>'); 

$product2 = Product::create(2,'Bruin brood', 3.10); 
print($product->getProductId()); 
print('<br>'); 
print($product->getNaam()); 
print('<br>'); 
print($product->getPrijs()); 
print('<br>'); 

print('<h2>Bestelling</h2>');
$best = new Bestelling($klant); 
$best->addProduct($product); 
$best->addProduct($product2); 
$best->setAfhaalDag('maandag'); 
print_r($best->getProducten()); 
print('<br>'); 
print('<br>'); 
print($best->getAfhaalDag()); 
print('<br>'); 
print('<br>'); 
print($best->getTotaalPrijs()); 
print('<br>'); 
print('<br>'); 
print_r($best->getKlant()); 

