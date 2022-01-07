<?php
$pageTitle = "Edit Account | LingoBuddy";
include "header.php";
?>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Edit Account</h2>
                <p>Change your account information below.</p>
            </div>
            <form action="account-view.php" method="post" class="row g-3" enctype="multipart/form-data">
                <p style="color:red;"><?php echo $_SESSION["edit_error"]; ?></p>
                <div class="col-md-6"><label class="form-label" for="first_name">First Name</label>
                    <input value="<?php echo user_first_name($user) ?>" required class="form-control" type="text" id="name" name="first_name">
                </div>
                <div class="col-md-6"><label class="form-label" for="last_name">Last Name</label>
                    <input value="<?php echo user_last_name($user) ?>" required class="form-control" type="text" id="name" name="last_name">
                </div>
                <div class="col-12"><label class="form-label" for="email">Email</label>
                    <input value="<?php echo user_email($user) ?>" required class="form-control" type="email" id="email" name="email">
                </div>
                <div class="col-md-6"><label class="form-label" for="phone_number">Phone Number</label>
                    <input value="<?php echo user_phone($user) ?>" required class="form-control" type="tel" id="phone_number" name="phone_number">
                </div>
                <div class="col-md-6"><label class="form-label" for="country">Country</label>
                    <input value="<?php echo user_country($user) ?>" required class="form-control" type="text" id="country" name="country">
                </div>
                <div class="col-12"><label class="form-label" for="password">Password</label>
                    <input value="<?php echo user_password($user) ?>" required class="form-control" type="password" id="password" name="password">
                </div>
                <div class="col-12"><label class="form-label" for="avatar">Profile Picture</label>
                    <input class="form-control" type="file" id="avatar" name="avatar_url">
                </div>
                <div class="col-12"><button class="btn btn-primary" name="submit" type="submit">Confirm</button></div>
            </form>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>