<?php
$pageTitle = "Log In | LingoBuddy";
include "header.php";


?>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Log In</h2>
            </div>
            <div class="wrapper">
                <form class="p-3 mt-3" method="GET" action="account-view.php">
                    <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span>
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="login" class="btn mt-3">Login</button>
                </form>
                <div class="text-center fs-6"><a href="signup.php"> Sign up</a> </div>
            </div>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>