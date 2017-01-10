<?php

//toonalleboeken.php
use VDAB\Boeken\Business\BoekService; 
use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

require_once 'Libraries/Twig/Autoloader.php';

Twig_Autoloader::register(); 
$loader = new Twig_Loader_Filesystem("src/VDAB/Boeken/Presentation"); 
$twig = new Twig_Environment($loader); 

$classLoader = new ClassLoader("VDAB", "src"); 
$classLoader->register(); 

$boekSvc = new BoekService();
$boekenLijst = $boekSvc->getBoekenOverzicht();

$view = $twig->render("boekenlijst.twig", array("boekenLijst"=> $boekenLijst)); 
//include("src/VDAB/Boeken/Presentation/boekenlijst.php");
print($view); 