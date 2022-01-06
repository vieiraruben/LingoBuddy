<?php

$pageTitle = "orderConfirmation";
include "header.php";

?>

<body>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <?php

                    session_start();
                    var_dump($_GET);

                    $check_yes = isset($_GET["yes"]);
                    $check_no = isset($_GET["no"]);
                    $option_start = isset($_GET["startLanguage"]);
                    $option_destination = isset($_GET["destinationLanguage"]);





                    if ($check_yes && !$check_no) {
                        if ($option_start != "none" && $option_destination != "none") {
                            echo 'You choose a start language : ' . $_GET["start_language"];
                            echo 'You choose a destination language : ' . $_GET["destination_language"];
                            $array = [$_GET["start_language"], $_GET["destination_language"]];
                            $_SESSION['array'] = $array;
                            var_dump($_SESSION['array']);

                            $sql = 'INSERT INTO user_order (user, original_language, target_language, price, interpreter) VALUES ("' . $_SESSION['user'] . '", "' .
                            $_GET['user'] . '", "' . $_GET['start_lang'] . '", "' .
                            $_GET['target_lang'] . '", "' . $_GET['price'] . '", "' .
                            $_GET['translator'] . '");';


                            $servername = "localhost";
                            $dbname = "lingobuddy";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'root');
                            $statement = $conn->prepare($sql);
                            $statement->execute($data);

                        } else {
                            header("location:order.php");
                        }
                    } elseif (!$check_yes && $checkNo) {
                        echo "no translator asked";

                    } elseif ($check_no && $check_yes){
                        header("location:order.php");
                        echo "only one case can be checked";

                    }else {
                        header("location:order.php");
                    }
                    ?>


                    <a href="order.php" alt="nouvelle demande">nouvelle demande</a>

                </div>
            </div>
        </section>
    </main>

</body>

<?php
include "footer.php";
?>