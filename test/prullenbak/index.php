<?php

use Projecten\Bakkerij\Business\BestelService; 
use Projecten\Bakkerij\Business\KlantService; 
use Projecten\Bakkerij\Business\ProductService; 

use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

require_once 'Libraries/Twig/Autoloader.php';

Twig_Autoloader::register(); 
$loader = new Twig_Loader_Filesystem("src/Projecten/Bakkerij/Presentaties"); 
$twig = new Twig_Environment($loader); 

$classLoader = new ClassLoader("Projecten", "src"); 
$classLoader->register();  



