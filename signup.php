<?php
$pageTitle = "Sign Up | LingoBuddy";
include "header.php";
?>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Create Account</h2>
                <p>Enter your details to create an account.</p>
            </div>

            <form class="row g-3" method="POST" action="login.php">
                <?php echo '<span class="col-12">' . $_SESSION["signup_msg"] . '</span>'; ?>
                <div class="col-md-6"><label class="form-label" for="first_name">First Name</label>
                    <input required class="form-control" type="text" id="name" name="first_name">
                </div>
                <div class="col-md-6"><label class="form-label" for="last_name">Last Name</label>
                    <input required class="form-control" type="text" name="last_name">
                </div>
                <div class="col-12"><label class="form-label" for="email">Email</label>
                    <input required class="form-control" type="email" id="email" name="email">
                </div>
                <div class="col-md-6"><label class="form-label" for="phone_number">Phone Number</label>
                    <input required class="form-control" type="tel" id="phone_number" name="phone_number">
                </div>
                <div class="col-md-6"><label class="form-label" for="country">Country</label>
                    <input required class="form-control" type="text" id="country" name="country">
                </div>
                <div class="col-md-6"><label class="form-label" for="password">Password</label>
                    <input required class="form-control" type="password" id="password" name="password">
                </div>
                <div class="col-md-6"><label class="form-label" for="password">Confirm Password</label>
                    <input type="password" class="form-control" name="cPassword" required>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" name="signup">Sign Up</button>
                </div>
                <div class="text-center col-12"> Already have an account? <a class="btn btn-secondary btn-sm small-btn" href="login.php"> Log In</a> </div>
            </form>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>