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

$pagina = "meldaan.twig";
if (isset($_COOKIE["email"])) {
    if (isset($_GET["exception"])) {
        $view = $twig->render($pagina, array("email" => $_COOKIE["email"], "fout"=> $_GET["exception"]));
    } else {
        $view = $twig->render($pagina, array("email" => $_COOKIE["email"]));
    }
} else {
    $view = $twig->render($pagina);
}
print($view);


