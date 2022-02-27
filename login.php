<?php
$pageTitle = "Log In | LingoBuddy";
include "header.php";
$_SESSION["signup_msg"] = "";
if (isset($_POST['signup'])) {
    $_SESSION["user"] = "";
    if ($_POST['password'] != $_POST['cPassword']) {
        $_SESSION["signup_msg"] = '<p style="color:red;">Your passwords did not match!</p>';
        header("Location:signup.php");
        exit;
    } else {
        $_SESSION["signup_msg"] = '<p style="color:green;">Account created successfully.<br>Please log in to view your account.</p>';
        $sql = 'INSERT INTO user (email, first_name, last_name, country, phone_number, password) VALUES ("' . $_POST['email'] . '", "' .
            $_POST['first_name'] . '", "' . $_POST['last_name'] . '", "' .
            $_POST['country'] . '", "' . $_POST['phone_number'] . '", "' .
            $_POST['password'] . '");';
        $servername = "localhost";
        $dbname = "lingobuddy";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'root');
        $statement = $conn->prepare($sql);
        $statement->execute($data);
        unset($_POST['signup']);
    };
}
if (isset($_POST['delete'])) {
    $sql = 'DELETE FROM user WHERE id =' . $_SESSION["user"] . ';';
    $servername = "localhost";
    $dbname = "lingobuddy";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'root');
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    unset($_POST['delete']);
    $_SESSION["signup_msg"] = '<p style="color:green;">Account successfully deleted.</p>';
    unset($_SESSION['user']);
}

?>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Log In</h2>
            </div>
            <form class="row g-3" method="GET" action="account-view.php">
                <?php if (isset($_SESSION["login_msg"])) echo '<span class="col-12" style="color:red;">' . $_SESSION["login_msg"] . '</span>'; ?>
                <div class="col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" type="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password" required>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary btn mt-3" type="submit" name="login">Log In</button>
                </div>
                <div class="text-center col-12">New user? <a class="btn btn-secondary btn-sm small-btn" href="signup.php">Sign Up</a> </div>

            </form>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>