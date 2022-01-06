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

                        $checkYes = isset ($_GET["yes"]);
                        $optionStart = isset($_GET["startLanguage"]);
                        $optionDestination = isset($_GET["destinationLanguage"]);



                            if ($checkYes){
                                if ($optionStart && $optionDestination){           
                                    echo 'You choose a start language : ' . $_GET["startLanguage"].PHP_EOL; 
                                    echo 'You choose a destination language : ' . $_GET["destinationLanguage"].PHP_EOL; 
                                    $array=[$_GET["startLanguage"],$_GET["destinationLanguage"]];
                                    $_SESSION['array'] = $array;
                                    var_dump($_SESSION['array']);             
                                }
                                
                            }elseif (condition) {
                                # code...
                            }{
                                echo "no translator asked";
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


