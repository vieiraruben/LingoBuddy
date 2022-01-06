<?php
function translator_price ($number_translator){
    if ($number_translator > 0){
        $translator_total = $number_translator * 50;
        return $translator_total;
    }
    else{
        echo "no translator choosen";
    }
}

$date = new DateTime();
$date->add(new DateInterval('P10D'));
echo $date->format('Y-m-d') . "\n";


//function translate_delivery($upload_date){
    //$today = date("F j, Y");
    //$delivery_date = $today + 10;
    //return $delivery_date;
//}

?>

