<?php
$pageTitle = "Register | LingoBuddy";
include "header.php";
?>

<?php 
//condition dans le cas ou les mots de passe ne sont pas identiques
if(isset($_POST['submit'])) {
    if ($_POST['password'] != $_POST['cPassword']){
        echo "Error your password did not match !";
    } else {echo "Votre compte a été crée avec succès";
    }
}    
?> 
<div class="wrapper">
    <div class="text-center mt-4 name"> Register </div>
    <form class="p-3 mt-3" method="POST" action="account.php">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="user_name" id="userName" placeholder="Username" required></div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="email" name="email" id="email" placeholder="Email"required></div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="tel" name="mobile" id="mobile" placeholder="Mobile"required></div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="country" id="country" placeholder="Country"required></div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password" required></div> 
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="cPassword" id="spwd" placeholder="Confirm Password" required></div> 
        <button class="btn mt-3" name ="submit">Sign Up</button>
    </form>
    <div class="text-center fs-6"> Already have an account ? <a href="account.php"> Login</a> </div>
</div>
<?php include "footer.php"; ?>
