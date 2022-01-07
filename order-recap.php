<?php
$pageTitle = "Confirm Order | LingoBuddy";
session_start();
$target_dir = getcwd() . DIRECTORY_SEPARATOR;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if ($_POST["start_language"] == $_POST["target_language"]) {
    $_SESSION["upload_msg"] = "Please choose different languages.";
    header("Location:order.php");
    exit();
}
if ($fileType != "pdf" && $fileType != "doc" && $fileType != "txt") {
    $_SESSION["upload_msg"] = "Only document file types are allowed.";
    header("Location:order.php");
    exit();
}
// File upload script
$_SESSION["order-array"] = $_POST;
$_SESSION["order-array"]["file"] = $_FILES["fileToUpload"]["name"];
if ($_FILES["fileToUpload"]["name"] != "") {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $_SESSION["upload_msg"] = "";
};
include "header.php";
?>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <?php if (!logged_in()) {
                    error_page();
                    include "footer.php";
                    exit();
                } ?>
                <h2 class="text-info">Order Confirmation</h2>
                <p>Check your order details and confirm.</p>
            </div>
            <div class="order-recap-container">
                <div class="card mb-4 order-details">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Source Language</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-muted mb-0"><?php echo $_POST['start_language'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Target Language</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-muted mb-0"><?php echo $_POST['target_language'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Word Count</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-muted mb-0"><?php echo $_POST['word_count'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Price</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-muted mb-0"><?php $_SESSION["order-array"]["price"] = price_calc($_POST['word_count']);
                                                            echo price_calc($_POST['word_count']) . ".00€"; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">File</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-muted mb-0"><?php echo $_FILES["fileToUpload"]["name"] ?></p>
                            </div>
                        </div>
                        <form id="add-order" method="GET" action="account-view.php">
                            <button class="btn btn-primary" type="submit" name="add-order">Confirm</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>