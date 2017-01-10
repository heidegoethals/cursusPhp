<?php

use VDAB\Boeken\Business\GenreService; 
use VDAB\Boeken\Business\BoekService; 
use VDAB\Boeken\Exceptions\TitelBestaatException; 
use Doctrine\Common\ClassLoader; 
require_once("Doctrine/Common/ClassLoader.php"); 

$classLoader = new ClassLoader("VDAB", "src"); 
$classLoader->register(); 

if (isset($_GET["action"]) && $_GET["action"] == "process") {
    try {
        BoekService::voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
        header("location: toonalleboeken.php");
        exit(0);
    } catch (TitelBestaatException $ex) {
        header("location: voegboektoe.php?error=titelbestaat");
        exit(0);
    }
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
    include("src/VDAB/Boeken/Presentation/nieuwboekForm.php");
} 