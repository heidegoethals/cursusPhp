<?php

use Projecten\Bakkerij\Business\BestelService; 
use Projecten\Bakkerij\Entities\Klant; 

use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

$classLoader = new ClassLoader("Projecten", "src"); 
$classLoader->register();  

$klant = Klant::create('test@gmail.com', 'test', 'Bert', 'Mortier', 'Apenstraat', '16', '8512', 'Wondergem'); 

$bestelservice = new BestelService; 
$bestellingen = $bestelservice->getBestellingen($klant); 
print_r($bestellingen); 

