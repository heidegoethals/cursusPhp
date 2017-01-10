<?php

print('<h1>Testen</h1>'); 

print('<h2>test BoekDAO</h2>');

require_once 'data/BoekDAO.php';

$dao = new BoekDAO();
$lijst = $dao->getAll(); 
$boek = $dao->getById(1); 
print("<pre>"); 
print_r($lijst); 
print_r($boek);
print("<pre>"); 


print('<h2>test GenreDAO</h2>');

require_once 'data/GenreDAO.php';

$dao = new GenreDAO();
$lijst = $dao->getAll(); 
$genre = $dao->getById(1); 
print("<pre>"); 
print_r($lijst); 
print_r($genre); 
print("<pre>"); 

print('<h2>test BoekService</h2>');

require_once 'business/BoekService.php';

$boekSvc = new BoekService();
$lijst = $boekSvc->getBoekenOverzicht(); 
print("<pre>"); 
print_r($lijst); 
print("<pre>"); 
