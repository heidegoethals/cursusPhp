<?php

//verwijderboek.php
use VDAB\Boeken\Business\BoekService; 
use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

$classLoader = new ClassLoader("VDAB", "src"); 
$classLoader->register(); 

$boekSvc = new BoekService();
$boekSvc->verwijderBoek($_GET["id"]);
header("location: toonalleboeken.php");
exit(0);
