<?php
require_once("RandomFromArray.php")
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tafels</title>
        <style>
            table, thead, tbody, th, td{
                border: 1px solid black; 
            }
        </style>
    </head>
    <body>
        <?php
        $lotto = new RandomFromArray;
        $uitkomst = $lotto->oefening7_4(); 
        ?>
        
        
        <table>
            <tbody>
                <tr>
                    <?php
                    foreach ($uitkomst as $i=>$kleur){
                        ?>
                    <td style="background-color: <?php print($kleur);?>">
                        <?php print($i) ;?> 
                    </td>
                        <?php
                    if ($i%7==0){
                        ?></tr><tr><?php 
                    }
                    }
                    ?>
                </tr>    
      
            </tbody>
        </table>
    </body>
</html>
