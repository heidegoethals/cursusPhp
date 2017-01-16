<?php

use Projecten\Bakkerij\Data\ProductDAO; 
use Projecten\Bakkerij\Data\BestellingDAO; 
use Projecten\Bakkerij\Data\BestellijnDAO; 
use Projecten\Bakkerij\Data\KlantDAO; 
use Projecten\Bakkerij\Entities\Klant; 
use Doctrine\Common\ClassLoader; 
require_once 'Doctrine/Common/ClassLoader.php';

$classLoader = new ClassLoader("Projecten", "src"); 
$classLoader->register();  

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
