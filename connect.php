<?php
session_start();
$user = $_SESSION["user"];
//example de utilisateur

$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = 'root';
$dbdatabase = 'lingobuddy';

$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

// if(!$dbConnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
//     die("Failed to connect!");
// }

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
function find_order($user)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = "SELECT * FROM `user_order` WHERE `user` =" . $user . ";";
    $result = $mysqli->query($sql);
    $mysqli->close();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                        <th scope="row">' . $row["id"] . '</th>
                        <td>' . $row["word_count"] . '</td>
                        <td>' . $row["price"] . '</td>
                        <td>' . $row["created_on"] . '</td>
                        <td>' . $row["file_url"] . '</td>
                        <td>Edit</td>
                    </tr>';
        }
    } else echo '<tr><td>No orders found</td></tr>';
}

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

function user_first_name($user)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = "SELECT `first_name` FROM `user` WHERE `id`=" . $user . ";";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    return $row["first_name"];
}

function user_last_name($user)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = "SELECT `last_name` FROM `user` WHERE `id`=" . $user . ";";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    return $row["last_name"];
}

function user_email($user)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = "SELECT `email` FROM `user` WHERE `id`=" . $user . ";";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    return $row["email"];
}

function user_password($user)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = "SELECT `password` FROM `user` WHERE `id`=" . $user . ";";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    return $row["password"];
}

function user_phone($user)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = "SELECT `phone_number` FROM `user` WHERE `id`=" . $user . ";";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    return $row["phone_number"];
}

function user_country($user)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = "SELECT `country` FROM `user` WHERE `id`=" . $user . ";";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    return $row["country"];
}

function price_calc($word): int
{
    if ($word * 0.18 < 25) return 25;
    return 1000 * 0.18;
}

function log_in($email, $password)
{
    // $_POST["email"];

    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = 'SELECT `id`, `email`, `password` FROM `user` WHERE email = "' . $email . '" AND password = "' . $password . '";';
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    return 'login function:' . var_dump($row[0]);
    if ($row["email"] == $email && $row["password"] == $password) {
        $_SESSION["user"] = $row["id"];
        $user = $_SESSION["user"];
        unset($_POST['login']);
        header("Location:account-view.php");
    } else {
        header("Location:login.php");
        exit;
    }
}

function logged_in()
{
    if ($_SESSION["user"] == "" || !isset($_SESSION["user"])) return false;
    else return true;
}

function error_page()
{
    echo
    '<img class="error-img" src="assets/img/error.png">
    <p style="color:red;"> Please log in to view this page</p>
    </div></div></section></main>';
}

function order_created($order)
{
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = "SELECT `created_on` FROM `user_order` WHERE `id`=" . $order . ";";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    return $row["created_on"];
}
