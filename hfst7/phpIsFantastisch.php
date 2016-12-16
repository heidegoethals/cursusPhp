<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP is FANTASTISCH</title>
        <style>
            p{
                margin: 0 auto; 
                text-align: center; 
            }
        </style>
    </head>
    <body>

            <?php 
                for($i=10;$i<=70;$i+=10){
            ?>
        <p style="font-size: <?php print($i);?>px;"> PHP is FANTASTISCH!</p>
                <?php }?> 

            <?php 
                for($i=60;$i>=10;$i-=10){
            ?>
        <p style="font-size: <?php print($i);?>px;"> PHP is FANTASTISCH!</p>
                <?php }?> 

    </body>
</html>
