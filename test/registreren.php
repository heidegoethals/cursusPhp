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
use Doctrine\Common\ClassLoader;

require_once("Doctrine/Common/ClassLoader.php");

require_once 'Libraries/Twig/Autoloader.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("src/Projecten/Bakkerij/Presentaties");
$twig = new Twig_Environment($loader);

$classLoader = new ClassLoader("Projecten", "src");
$classLoader->register();


if (isset($_POST["email"]) and isset($_POST["naam"]) and isset($_POST["voornaam"]) and isset($_POST["straat"]) and isset($_POST["huisnr"]) and isset($_POST["postcode"]) and isset($_POST["gemeente"])) {
    $klantSvc = new KlantService; 
    $klant = $klantSvc->nieuweKlant($_POST["email"], $_POST["naam"], $_POST["voornaam"], $_POST["straat"], $_POST["huisnr"], $_POST["postcode"], $_POST["gemeente"]);
    $_SESSION["klant"] = serialize($klant);
        $pagina = "geregistreerd.twig";
    $view = $twig->render($pagina, array("klant"=> $klant));
    print($view);    
} else {
    $pagina = "registreer.twig";
    $view = $twig->render($pagina);
    print($view);
}
