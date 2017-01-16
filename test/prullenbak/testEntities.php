<?php

use Projecten\Bakkerij\Entities\Klant; 
use Projecten\Bakkerij\Entities\Product; 
use Projecten\Bakkerij\Entities\Bestelling; 
use Projecten\Bakkerij\Entities\BestelLijn; 

use Projecten\Bakkerij\Data\ProductDAO; 
use Projecten\Bakkerij\Data\BestellingDAO; 
use Projecten\Bakkerij\Data\BestellijnDAO; 
use Projecten\Bakkerij\Data\KlantDAO; 

use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

$classLoader = new ClassLoader("Projecten", "src"); 
$classLoader->register();  

print('<h1>Tests entities</h1>');
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



print('<h2>BestelLijn</h2>');

$bestelLijn = new BestelLijn($product, 2); 
print_r($bestelLijn->getAantal()); 
print('<br>'); 
print_r($bestelLijn->getProduct());
print('<br>'); 

print_r($bestelLijn->getTotaalPrijs()); 



print('<h2>Bestelling</h2>');
$bestelLijn2 = new BestelLijn($product2, 1000); 

$best = new Bestelling($klant); 
$best->addBestellijn($bestelLijn); 
$best->addBestellijn($bestelLijn2); 
$best->setAfhaalDag('maandag'); 


print_r($best->getBestellijnen()); 
print('<br>'); 
print('<br>'); 
print($best->getAfhaalDag()); 
print('<br>'); 
print('<br>'); 
print($best->getTotaalPrijs()); 
print('<br>'); 
print('<br>'); 
print_r($best->getKlant()); 

print('<br>'); 
print('<br>'); 

$lijst = array(); 
array_push($lijst, $product); 
array_push($lijst, $product2); 
$best2 = Bestelling::create(456, $lijst, 'maandag', 1.1, $klant); 
print_r($best2); 


print('<h1>Tests Data</h1>');
print('<h2>ProductDAO</h2>');

$productDAO = new ProductDAO; 
print_r($productDAO->getById(5)); 
print('<br>'); 
print('<br>'); 
print('<br>'); 

print_r($productDAO->getAll()); 


print('<h2>BestelLijnDAO</h2>');
$BestellijnDAO = new BestellijnDAO; 
print('<br>'); 
print('<br>'); 
print('<br>'); 

//print_r($BestellijnDAO->addAllToBestellingen()); 


print('<h2>KlantDAO</h2>');

$KlantDAO = new KlantDAO; 
print($KlantDAO->getWoonplaatsId('8520')); 
print_r($KlantDAO->getByEmail('test@gmail.com')); 
print('<br>'); 
$klant = $KlantDAO->getByEmail('test2@gmail.com'); 
$klant->setVoornaam('test222222'); 
$KlantDAO->updateKlant($klant); 

print('<br>'); 
print('<br>'); 


print('<h2>BestellingDAO</h2>');
$BestellingDAO = new BestellingDAO; 
print_r($BestellingDAO->getAll()); 
print('<br>'); 
print('<br>'); 
print_r($BestellingDAO->getByEmail('test@gmail.com')); 
print('<br>'); 
print('<br>'); 
print_r($BestellingDAO->getById(1)); 

$BestellingDAO->slaBestellingOp($best); 
print('<br>'); 
print('<br>'); 
print('<br>'); 
print('<br>'); 
print('<p>Met extra bestelling</p>');
print('<br>'); 


print_r($BestellingDAO->getAll()); 


print('<br>'); 
print('<br>'); 
print('<br>'); 
print('<br>'); 
print('<p>Terug weg</p>');
print('<br>'); 
 
$BestellingDAO->deleteBestelling($BestellingDAO->getById(8)); 
$BestellingDAO->deleteBestelling($BestellingDAO->getById(9)); 

print_r($BestellingDAO->getAll()); 
