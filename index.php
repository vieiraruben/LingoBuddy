<?php
$pageTitle = "Home | LingoBuddy";
if (isset($_GET["logout"])) {
    session_start();
    session_unset();
};
include "header.php";
?>
<main class="page landing-page">
    <section class="clean-block clean-hero" style="color:rgba(255, 255, 255);">
        <div class="d-flex justify-content-around">
            <img class="text" src="assets/img/language-translator.png" alt="" width="400" height="400">
            <div class="text flex-column d-flex justify-content-around">
                <h1>Welcome to LingoBuddy</h1>
                <h2>Get your professional translation from a real interpreter now.</h2>
                <a href="pricing.php" class="btn btn-outline-dark" role="button" aria-pressed="true">Learn More</a>
            </div>
        </div>
    </section>
    <section class="clean-block clean-info dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Entrust your content to our experienced interpreters!</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="assets/img/solution.jpg" alt="">
                        <div class="card-body info">
                            <h4 class="card-title">Turn-key solution</h4>
                            <p class="card-text">Do you need a translation of a document ? Just import it and you will have your document translated and sent within hours or days! </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="assets/img/best.jpg" alt="">
                        <div class="card-body info">
                            <h4 class="card-title">Excellency</h4>
                            <p class="card-text">Our interpreters have a minimum of 5 years experience. Moreover, they have all studied or lived abroad </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="assets/img/data.jpg" alt="">
                        <div class="card-body info">
                            <h4 class="card-title">Protection of your data</h4>
                            <p class="card-text">We are an European company, which applies the regulations of personal data protection. Your content remains your full and exclusive property.</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php include "footer.php"; ?>