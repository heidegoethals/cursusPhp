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
$klant = unserialize($_SESSION["klant"]);


if (isset($_POST["naam"]) and isset($_POST["voornaam"]) and isset($_POST["straat"]) and isset($_POST["huisnr"]) and isset($_POST["postcode"]) and isset($_POST["gemeente"])) {
    $klantSvc = new KlantService;
    $klant->setVoornaam($_POST["voornaam"]);
    $klant->setNaam($_POST["naam"]);
    $klant->setStraat($_POST["straat"]);
    $klant->setHuisnr($_POST["huisnr"]);
    $klant->setPostcode($_POST["postcode"]);
    $klant->setGemeente($_POST["gemeente"]);

    $_SESSION["klant"] = serialize($klant);


    $klantSvc->updateKlant($klant);
header('Location: hoofdpagina.php'); 
exit(0); 
}
elseif (isset($_POST["wachtwoord"])) {
    $klantSvc = new KlantService;
    $klant->setWachtwoord($_POST["wachtwoord"]);


    $_SESSION["klant"] = serialize($klant);


    $klantSvc->updateKlant($klant);
header('Location: hoofdpagina.php'); 
exit(0); 
}


else {
    $pagina = "pasgegevensaan.twig";
    $view = $twig->render($pagina, array("klant" => $klant));
    print($view);
}
