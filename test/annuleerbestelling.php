
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


$classLoader = new ClassLoader("Projecten", "src");
$classLoader->register();

if (isset($_SESSION["klant"])) {
    $klant = unserialize($_SESSION["klant"]);
    if (isset($_GET["bestelid"])) {
        $bestelSvc = new BestelService;        
        $bestelSvc->deleteBestelling($_GET["bestelid"], $klant); 
}}

header('Location: bestellingnakijken.php'); 
exit(0); 