<?php
$pageTitle = "Sign Up | LingoBuddy";
include "header.php";
?>
<div class="wrapper">
    <div class="text-center mt-4 name"> Sign Up </div>
    <?php echo '<p>' . $_SESSION["signup_msg"] . '</p>'; ?>
    <form class="p-3 mt-3" method="POST" action="login.php">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span>
            <input type="text" name="first_name" placeholder="First Name" required>
        </div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span>
            <input type="text" name="last_name" placeholder="Last Name" required>
        </div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span>
            <input type="tel" name="phone_number" placeholder="Phone Number" required>
        </div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="country" id="country" placeholder="Country" required></div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span>
            <input type="password" name="cPassword" placeholder="Confirm Password" required>
        </div>
        <button class="btn mt-3" name="signup">Sign Up</button>
    </form>
    <div class="text-center fs-6"> Already have an account ? <a href="login.php"> Log In</a> </div>
</div>
<?php include "footer.php"; ?>