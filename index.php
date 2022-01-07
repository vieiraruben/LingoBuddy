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
            <img class="text" src="assets/img/language-translator.png" width="400" height="400">
            <div class="text flex-column d-flex justify-content-around">
                <h1>Welcome to LingoBuddy</h1>
                <h2>Get your professional translation from a real interpreter now.</h2>
                <a href="pricing.php" class="btn btn-outline-dark" role="button" aria-pressed="true">Learn More</a>
            </div>
        </div>
    </section>
    section class="clean-block clean-info dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Entrust your content to our experienced interpreters!</h2>
             </div>   
             <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="assets/img/solution.jpg">
                        <div class="card-body info">
                            <h4 class="card-title">Turn-key solution</h4>
                            <p class="card-text">Do you need a translation of a document ? Just import it and you will have your document translated and sent within hours or days! </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="assets/img/best.jpg">
                        <div class="card-body info">
                            <h4 class="card-title">Excellency</h4>
                            <p class="card-text">Our interpreters have a minimum of 5 years experience. Moreover, they have all studied or lived abroad </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="assets/img/data.jpg">
                        <div class="card-body info">
                            <h4 class="card-title">Protection of your data</h4>
                            <p class="card-text">We are an European company, which applies the regulations of personal data protection. Your content remains your full and exclusive property.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="pricing.php" class="btn btn-outline-dark" role="button" aria-pressed="true">Discover our offers! </a>      
            </div>
        </div>    
    </section>
    <section class="clean-block slider dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Our partners who recommend us !</h2>
            </div>
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/peinture.jpg " alt="Slide Image"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="assets/img/paris.jpg" alt="Slide Image"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>