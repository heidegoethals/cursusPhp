<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gebruikersinvoer</title>
    </head>
    <body>
        <h1>
            <?php
            print("Goeiemorgen, "); 
            print($_POST["naam"]); 
            print("."); 
            ?>   
            <?php
            print("Het is vandaag "); 
            print($_POST["dag"]); 
            print("..."); 
            ?>
        </h1>

    </body>
</html>
