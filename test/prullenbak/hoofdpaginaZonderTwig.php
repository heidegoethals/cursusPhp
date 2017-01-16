<?php

session_start();

use Projecten\Bakkerij\Business\BestelService; 
use Projecten\Bakkerij\Business\KlantService; 
use Projecten\Bakkerij\Business\ProductService; 

use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

$classLoader = new ClassLoader("Projecten", "src"); 
$classLoader->register();  


$klantSvc = new KlantService();

include("src/Projecten/Bakkerij/Presentaties/home.html");


