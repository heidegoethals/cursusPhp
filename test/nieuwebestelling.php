<?php

session_start();

unset($_SESSION["bestelling"]);

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
use Projecten\Bakkerij\Exceptions\KlantGeblokkeerdException; 
use Projecten\Bakkerij\Exceptions\BestellingNegatiefAantal; 
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
if (isset($_SESSION["klant"])) {
    $klant = unserialize($_SESSION["klant"]);
    if (!($klant->getGeblokkeerd() == 1)) {
        $view = $twig->render($pagina, array("klant" => $klant, "producten" => $producten));
    } else {
        $pagina = "geblokkeerd.twig";
        $view = $twig->render($pagina, array("klant" => $klant));
    }
} else {
    $view = $twig->render("aanmelden.php");
}

$bestelSvc = new BestelService;
if (!isset($_SESSION["bestelling"])) {
    try {
        $bestelling = $bestelSvc->startNieuweBestelling($klant);
         $_SESSION["bestelling"] = serialize($bestelling);
    } catch (KlantGeblokkeerdException $ex) {
        $pagina = "geblokkeerd.twig";
        $view = $twig->render($pagina, array("klant" => $klant));
    }

   
} else {
    $bestelling = unserialize($_SESSION["bestelling"]);
}

foreach ($producten as $product) {
    if (!empty($_POST[$product->getProductId()])) {
        try{
        $bestelSvc->voegToe($bestelling, $product, $_POST[$product->getProductId()]);
        $_SESSION["bestelling"] = serialize($bestelling);
        $pagina = "bevestigenbestelling.twig";
        $view = $twig->render($pagina, array("klant" => $klant, "bestelling" => $bestelling));
        } catch (BestellingNegatiefAantal $ex){
            print("Product ".$product->getNaam()." is niet toegevoegd, omdat je een negatief aantal selecteerde. Ga terug naar het bestelmenu indien je het product toch wil toevoegen."); 
            // opmerking: dit staat niet mooi, zou ik opvangen in een variabele en dan tonen op de overzichtspagina. Maar wegens tijdsgebrek niet gedaan. 
        }
    }
}

print($view);


