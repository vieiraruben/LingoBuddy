<?php
$pageTitle = "Log In | LingoBuddy";
include "header.php";
$_SESSION["signup_msg"] = "";
if (isset($_POST['signup'])) {
    $_SESSION["user"] = "";
    if ($_POST['password'] != $_POST['cPassword']) {
        $_SESSION["signup_msg"] = '<p style="color:green;">Error: Your passwords did not match!</p>';
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
            <div class="wrapper">
                <?php echo $_SESSION["signup_msg"]; ?>

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