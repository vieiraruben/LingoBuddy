<?php
$pageTitle = "My Account | LingoBuddy";
include "header.php";
$user = $_SESSION["user"];
$user_data = check_login($dbConnection);

?>
<main class="page contact-us-page">

    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">My Account</h2>
                <p><?php

                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $country = $_POST['country'];
                        $password = $_POST['password'];
                        $phone_number = $_POST['phone_number'];

                        $sql = 'UPDATE user SET email ="' . $_POST['email'] . '" WHERE id = 101';

                        // $sql = "UPDATE user SET email=:email, location=:location WHERE id =:101";
                        $servername = "localhost";
                        $dbname = "lingobuddy";
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", 'root', 'root');
                        $statement = $conn->prepare($sql);

                        if ($statement->execute($data)) {
                            echo '<p style="color:green; font-weight: bold;"> Account updated successfully!</p>';
                        }
                        unset($_POST['submit']);
                    }; ?></p>
                <p>View your account details and recent orders.</p>
            </div>
            <div class="account-container">
                <div class="card mb-4 contact-details">
                    <div class="card-body">
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
                    <p class="editacc"><a href="/editaccount.php">Edit account</a></p>
                </div>
                <table class="table table-striped table-hover">
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
            </div>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>