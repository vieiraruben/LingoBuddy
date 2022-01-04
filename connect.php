<?php $dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = 'root';
$dbdatabase = 'lingobuddy';

$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

// Check connection
// if ($mysqli === false) {
// die("ERROR: Could not connect. " . $mysqli->connect_error);
// }

// Print host information
// echo "Connect Successfully. Host info: " . $mysqli->host_info;


// $sql = "SELECT * FROM `users`;";
// $result = $mysqli->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo $row;
//         echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }
// $conn->close();


// function languages_spoken($translator)
// {
//     $sql = "SELECT `translator`.`language`, `translator`.`language_2`, `translator`.`language_3` FROM `translator` WHERE `id`=120";


//     return $num * $num;
// }
