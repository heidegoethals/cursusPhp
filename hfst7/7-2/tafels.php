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
        $array = $tafels->tafel($_GET["getal"]);
        ?>
        <div>
        <table>
            <thead>
                <tr>
                    <th colspan="2">De tafel van <?php print($_GET["getal"]);?></th>
                </tr>
            </thead>
            <tbody>

                <?php
                for ($i = 1; $i <= 10; $i++) {
                    ?>
                    <tr>
                        <td><?php print($i); ?> maal <?php print($_GET["getal"]); ?></td>
                        <td><?php print($array[$i]); ?></td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
    </body>
</html>
