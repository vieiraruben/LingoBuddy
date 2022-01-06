<?php
include "connect.php";
function translator_price($number_translator)
{
    if ($number_translator > 0) {
        $translator_total = $number_translator * 50;
        return $translator_total;
    } else {
        echo "no translator choosen";
    }
}

echo order_created(1);
$date = order_created(1);
// $date->add(new DateInterval('P10D'));
// echo $date->format('Y-m-d') . "\n";



// $date = new DateTime('2000-01-01');
$date->add(new DateInterval('PT10H30S'));
echo $date->format('Y-m-d H:i:s') . "\n";

//function translate_delivery($upload_date){
    //$today = date("F j, Y");
    //$delivery_date = $today + 10;
    //return $delivery_date;
//}



Add order to a database:



$sql = 'INSERT INTO user_order (user, start_lang, target_lang, price, translator) VALUES ("' . $_SESSION['user'] . '", "' .
$_POST['first_name'] . '", "' . $_POST['last_name'] . '", "' .
$_POST['country'] . '", "' . $_POST['phone_number'] . '", "' .
$_POST['password'] . '");';


$servername = "localhost";
$dbname = "lingobuddy";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'root');
$statement = $conn->prepare($sql);
$statement->execute($data);
