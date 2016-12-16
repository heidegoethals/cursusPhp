<?php

require_once 'Bericht.php';

// construct bericht ::metGegevens
print('Test 1:<br>');
print('verwachtte output: Heide - test - huidige datum & tijd ');
print('<br>');
$bericht1 = Bericht::metGegevens('Heide','test',date("Y-m-d G:i:s")); 
print($bericht1->getAuteur().' - '); 
print($bericht1->getBoodschap().' - '); 
print($bericht1->getDatum().'<br><br>'); 

// construct bericht ::metID
print('Test 2:<br>');
print('verwachtte output: Bezoeker - Even testen of het gastenboek werkt... - 2010-05-11 09:22:44'); 
print('<br>');
$bericht2 = Bericht::metId(2); 
print($bericht2->getAuteur().' - '); 
print($bericht2->getBoodschap().' - '); 
print($bericht2->getDatum().'<br><br>'); 

// test lijsten
print('Test 3:<br>');
print('verwachtte output: herhaald test 1 en test 2 '); 
print('<br>');
$lijst = array(); 
$lijst[]=$bericht1; 
$lijst[]=$bericht2; 
foreach ($lijst as $bericht) {
    print($bericht->getAuteur().' - '); 
    print($bericht->getBoodschap().' - '); 
    print($bericht->getDatum().'<br><br>');  
}

// test voegToeAanDb
//print('Test 4:<br>');
//print('verwachtte output: voegt bericht1 toe aan database. <br> VERGEET DIT NIET OPNIEUW TE WISSEN!'); 
//print('<br>');
//
//$bericht1->voegToeAanDb(); 

// test printBericht
print('Test 4:<br>');
print('verwachtte output: print test1'); 
print('<br>');
print$bericht1->printBericht();

print($bericht1->getDatum()); 