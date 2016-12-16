<?php

class Main {
    public function onevenDanEven($min, $max){
        $tabOneven = array();
        $tabEven = array(); 
        for($i=$min;$i<=$max;$i++){
          if ($i % 2 == 1)  {
              array_push($tabOneven, $i); 
          }
          else{
              array_push($tabEven, $i);
          }
        }
        $tab = array_merge($tabOneven, $tabEven); 
        return $tab; 
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tachtig</title>
    </head>
    <body>
        <pre>
        <?php 
        $main = new Main;
        print_r($main->onevenDanEven(1, 50)); 
        ?>
        </pre>
    </body>
</html>