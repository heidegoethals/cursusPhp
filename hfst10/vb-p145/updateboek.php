<?php

//updateboek.php
use VDAB\Boeken\Business\GenreService; 
use VDAB\Boeken\Business\BoekService; 
use VDAB\Boeken\Exceptions\TitelBestaatException; 
use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

require_once 'Libraries/Twig/Autoloader.php';

Twig_Autoloader::register(); 
$loader = new Twig_Loader_Filesystem("src/VDAB/Boeken/Presentation"); 
$twig = new Twig_Environment($loader); 


$classLoader = new ClassLoader("VDAB", "src"); 
$classLoader->register(); 

if (isset($_GET["action"]) && $_GET["action"] == "process") {
    try {
        $boekSvc = new BoekService();
        $boekSvc->updateBoek($_GET["id"], $_POST["txtTitel"], $_POST["selGenre"]);
        header("location: toonalleboeken.php");
        exit(0);
    } catch (TitelBestaatException $ex) {
        header("location: updateboek.php?id=".$_GET["id"]."&error=titelbestaat");
        exit(0);
    }
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    $boekSvc = new BoekService();
    $boek = $boekSvc->haalBoekOp($_GET["id"]);
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
    
    
$view = $twig->render("updateboekForm.twig", array("boek"=> $boek, "genreLijst"=> $genreLijst, "error"=>$_GET["error"])); 
print($view); 
    //include("src/VDAB/Boeken/Presentation/updateboekForm.php");
} 