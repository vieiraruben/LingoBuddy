<?php
$pageTitle = "My Account | LingoBuddy";
if (isset($_GET['login'])) {
    session_start();
    $mysqli = new mysqli('localhost', 'root', 'root', 'lingobuddy');
    $sql = 'SELECT `id`, `email`, `password` FROM `user` WHERE email = "' . $_GET['email'] . '" AND password = "' . $_GET['password'] . '";';
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $mysqli->close();
    if ($row["email"] == $_GET['email'] && $row["password"] == $_GET['password']) {
        $_SESSION["user"] = $row["id"];
        $user = $_SESSION["user"];
        unset($_GET['login']);
        unset($_SESSION["login_msg"]);
    } else {
        $_SESSION["login_msg"] = "Invalid login details.";
        header("Location:login.php");
        exit;
    }
}
//avatar


session_start();
$target_dir = getcwd() . DIRECTORY_SEPARATOR;
$target_file = $target_dir . basename($_FILES["avatar_url"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if ($_FILES["avatar_url"]["name"] != "") {
    if ($fileType != "jpg" && $fileType != "png") {
        $_SESSION["edit_error"] = "Only image file types are allowed.";
        exit();
    } else {
        move_uploaded_file($_FILES["avatar_url"]["tmp_name"], $target_file);
        $_SESSION["avatar_file"] = $_FILES["avatar_url"]["name"];
        $sql = 'UPDATE user SET avatar_url ="' . $_SESSION["avatar_file"] . '" WHERE id = "' . $_SESSION["user"] . '";';
        $servername = "localhost";
        $dbname = "lingobuddy";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'root');
        $statement = $conn->prepare($sql);
        $statement->execute($data);
    }
};

//

include "header.php";
if (isset($_GET['add-order'])) {
    $sql = 'INSERT INTO user_order (user, word_count, price, file_url, original_language, target_language, created_on) 
    VALUES ("' . $_SESSION["user"] . '", "' . $_SESSION["order-array"]["word_count"] . '", "' .
        $_SESSION["order-array"]["price"] . '", "' . $_SESSION["order-array"]["file"] . '", "' .
        $_SESSION["order-array"]["start_language"] . '", "' . $_SESSION["order-array"]["target_language"] . '", NOW());';
    $servername = "localhost";
    $dbname = "lingobuddy";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'root');
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    unset($_SESSION["order-array"]);
}
?>
<script>
    function toggledelete() {
        var toggle = document.getElementById("confirm-delete");
        if (toggle.style.display == "none") {
            toggle.style.display = "block";
        } else {
            toggle.style.display = "none";
        }
    }
</script>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <?php if (!logged_in()) {
                    error_page();
                    include "footer.php";
                    exit();
                } ?>
                <h2 class="text-info">My Account</h2>
                <p><?php
                    if (isset($_POST['submit'])) {
                        $sql = 'UPDATE user SET email ="' . $_POST['email'] . '", first_name ="' .
                            $_POST['first_name'] . '", last_name ="' . $_POST['last_name'] . '", country ="' .
                            $_POST['country'] . '", phone_number ="' . $_POST['phone_number'] . '", password ="' .
                            $_POST['password'] . '" WHERE id = "' . $_SESSION["user"] . '";';
                        $servername = "localhost";
                        $dbname = "lingobuddy";
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'root');
                        $statement = $conn->prepare($sql);
                        if ($statement->execute($data)) {
                            echo '<p style="color:green; font-weight: bold;">&#9989; Account updated successfully!</p>';
                        }
                        unset($_POST['submit']);
                    }; ?></p>
                <p>View your account details and recent orders.</p>
            </div>
            <div class="account-container">
                <div class="card mb-4 contact-details">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <span class="avatar-container">
                                    <img class="avatar-pic" src="<?php echo avatar_url($user) ?>">
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo user_first_name($user) . " " . user_last_name($user) ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo user_email($user) ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo user_phone($user) ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Country</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo user_country($user) ?></p>
                            </div>
                        </div>

                    </div>
                    <p class="editacc"><a class="btn btn-outline-primary btn-sm" href="editaccount.php">Edit account</a></p>
                    <a class="btn btn-outline-primary btn-sm" href="#" id="deleteacc" onclick="toggledelete()"> Delete account</a>
                    <form id="delete-form" method="POST" action="login.php">
                        <p id="confirm-delete" style="display: none;">Are you sure?<button type="submit" style="margin-left:13px;" name="delete" class="btn btn-danger" ">Delete</button></p>


                </div>
                <div class=" table-body">
                                <table class=" table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Word Count</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Created On</th>
                                            <th scope="col">File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php find_order($user) ?>
                                    </tbody>
                                </table>
                                <div class="order-container">
                                    <a class="btn btn-primary new-order" href="order.php" role="button">New Order</a>
                                </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>