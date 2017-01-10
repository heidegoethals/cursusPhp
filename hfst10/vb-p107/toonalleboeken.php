<?php

require_once 'business/BoekService.php';

$boekSvc = new BoekService(); 
$boekenLijst = $boekSvc->getBoekenOverzicht(); 
include("presentation/boekenlijst.php");
