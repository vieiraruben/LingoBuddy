<?php

var_dump($_GET);

$array = [];
$checkYes = isset ($_GET["yes"]);
$optionStart = isset($_GET["startLanguage"]);
$optionDestination = isset($_GET["destinationLanguage"]);

    if ($checkYes){
        if ($optionStart && $optionDestination){
            $array[] = $_GET["startLanguage"];
            $array[] = $_GET["destinationLanguage"];
            var_dump($array);
            echo 'You choose a start language : ' . $_GET["startLanguage"].PHP_EOL; 
            echo 'You choose a destination language : ' . $_GET["destinationLanguage"].PHP_EOL;       
        }
    }else{
        echo "no translator asked";
    }
?>

<main>    
    <a href="order.php" alt="nouvelle demande">nouvelle demande</a>
</main>



