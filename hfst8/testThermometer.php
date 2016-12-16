<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Thermometer.php';

?>

<!doctype HTML> 
<html>
    <head>
    <metadata charset="utf-8">
    <title>Test thermomenter</title>
    </head>
    <body>
        <?php
            $thermometer = new Thermometer(20); 
            $thermometer->verhoog(3); 
            $thermometer->verlaag(7); 
            print($thermometer->getGraden()); ?>
            <br>
            <?php
            $thermometer = new Thermometer(-55); 
            $thermometer->verhoog(3); 
            $thermometer->verlaag(7); 
            print($thermometer->getGraden()); 
        ?>
    </body>
</html>