<?php

//dbGegevensOphalenParams.php

class PersonenLijst {

    public function getLijst() {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");

        //positionele params 

        $stmt = $dbh->prepare("select familienaam, voornaam from personen");
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        var_dump($resultSet);

        //benoemde params 
        //$sql = "select familienaam, voornaam from personen 
        // where familienaam = :fn and geslacht = :gesl "; 
        //$stmt = $dbh->prepare($sql);
        //$stmt->execute(array(':fn' => $familienaam, ':gesl' => $geslacht)); 
        //$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lijst = array();
        foreach ($resultSet as $rij) {
            $naam = $rij["familienaam"] . ", " . $rij["voornaam"];
            array_push($lijst, $naam);
        }

        $dbh = null;
        return $lijst;
    }

}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Databanken introductie</title>
    </head>
    <body>
        <?php
        $pl = new PersonenLijst();
        $tab = $pl->getLijst();
        //$tab = $pl->getLijst('Peeters','V');
        ?>
        <ul>
            <?php
            foreach ($tab as $naam) {
                print("<li>" . $naam . "</li>");
            }
            ?>
        </ul>

    </body>
</html> 