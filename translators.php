<?php
$pageTitle = "Translators | LingoBuddy";
include "header.php";
?>
<main class="page">
    <section class="clean-block about-us">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Translators</h2>
                <p>Get to know the following professional translators available for your requests.</p>
            </div>
            <div class="row justify-content-center">
                <?php
                $sql = "SELECT * FROM `translator`;";
                $result = $mysqli->query($sql);
                // if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '
                  <div class="col-sm-6 col-lg-4">
                        <div class="card text-center clean-card">
                        <img class="card-img-top w-100 d-block" src="assets/img/avatars/' . $row["avatar_url"] . '">
                        <div class="card-body info">
                            <h4 class="card-title">' .
                        $row["first_name"] .
                        " " .
                        $row["last_name"] .
                        '</h4>
                            <p class="card-text">Can translate ' . languages_spoken($row["id"]) . '</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                    </div>
                </div>';
                    // }
                };
                // else {
                // echo "0 results";
                // }
                // $conn->close();
                echo '
            </div>
        </div>
    </section>
</main>';
                ?>

                <?php include "footer.php"; ?>