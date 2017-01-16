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

$productSvc = new ProductService; 
$producten = $productSvc->getProducten(); 

$pagina = "nieuwebestelling.twig"; 
if (isset($_SESSION["klant"])){
    $klant = unserialize($_SESSION["klant"]); 
    $view = $twig->render($pagina, array("klant"=> $klant, "producten"=>$producten));  
}
else{
    $view = $twig->render("aanmelden.php"); 
}

$bestelSvc = new BestelService; 
if (!isset($_SESSION["bestelling"])){
    $bestelling = $bestelSvc->startNieuweBestelling($klant); 
    $_SESSION["bestelling"] = serialize($bestelling); 
}
else{
    $bestelling = unserialize($_SESSION["bestelling"]); 
}

foreach ($producten as $product )
{
    if (!empty($_POST[$product->getProductId()])){
        $bestelSvc->voegToe($bestelling, $product, $_POST[$product->getProductId()]); 
        $_SESSION["bestelling"] = serialize($bestelling); 
        $pagina = "bevestigenbestelling.twig"; 
        $view = $twig->render($pagina, array("klant"=> $klant, "bestelling"=>$bestelling));  
    }
}

print($view); 


