<?php
require_once("TafelsBerekenen.php")
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
            div{
                border: 1px solid blue; 
                padding: 6px; 
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <?php
        $tafels = new Tafels;
        ?>
        <div>
        <table>
            <tbody>
                    <?php
                    for ($j = 1; $j<=10; $j++){
                    $array = $tafels->tafel($j);
                    ?>
                
                    <tr>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                    ?>
                        <td><?php print($array[$i]); ?></td>
                    <?php } ?>
                    </tr>
                    <?php } ?>
                    
            </tbody>
        </table>
    </div>
    </body>
</html>
