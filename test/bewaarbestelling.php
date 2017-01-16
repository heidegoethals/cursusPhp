<?php

session_start();

use Projecten\Bakkerij\Business\BestelService; 
use Projecten\Bakkerij\Business\KlantService; 
use Projecten\Bakkerij\Business\ProductService; 

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

require_once 'Libraries/Twig/Autoloader.php';

Twig_Autoloader::register(); 
$loader = new Twig_Loader_Filesystem("src/Projecten/Bakkerij/Presentaties"); 
$twig = new Twig_Environment($loader); 

$classLoader = new ClassLoader("Projecten", "src"); 
$classLoader->register();  

$pagina = "nieuwebestelling.twig"; 
if (isset($_SESSION["klant"])){
    $klant = unserialize($_SESSION["klant"]); 
}
else{
    //TODO: exception: bestelling bevestigen zonder ingelogd te zijn kan niet
}

$bestelling = unserialize($_SESSION["bestelling"]); 

$bestelSvc = new BestelService; 
$bestelSvc->slaBestellingOp($bestelling, $_POST["afhaaldag"]); 

header('location: hoofdpagina.php'); 
exit(0); 