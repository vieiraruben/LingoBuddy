<?php
session_start();

$dbhost = 'localhost';
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

function log_out()
{
    session_unset();
    session_destroy();
}

function languages_spoken($translator)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');

    $sql = "SELECT name FROM language JOIN translator ON language.id = translator.language 
        OR language.id = translator.language_2 OR language.id = translator.language_3 WHERE translator.id = " . $translator . ";";

    $result = $mysqli->query($sql);
    $languages = array();
    $output = "";

    $mysqli->close();
    while ($row = $result->fetch_assoc()) {
        $languages[] = $row["name"];
    }

    for ($i = 0; $i < count($languages); $i++) {
        if ($i == count($languages) - 1) {
            $output .= $languages[$i] . ".";
        } else {
            $output .= $languages[$i] . ", ";
        }
    }
    return $output;
}
