<?php
$pageTitle = "Register | LingoBuddy";
include "header.php";
?>
<div class="wrapper">
    <div class="text-center mt-4 name"> Register </div>
    <form class="p-3 mt-3" method="POST" action="">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="userName" id="userName" placeholder="Username"> </div>
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="email" name="email" id="email" placeholder="Email"> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> </div> 
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="cPassword" id="spwd" placeholder="Confirm Password"> </div> 
        <button class="btn mt-3">Sign Up</button>
    </form>
    <div class="text-center fs-6"> Already have an account ? <a href="account.php"> Login</a> </div>
</div>
<?php include "footer.php"; ?>