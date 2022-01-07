<?php
$pageTitle = "New Order | LingoBuddy";
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
                <h2 class="text-info">New Order</h2>
                <p>Fill out the form below to create your translation order.</p>
            </div>
            <form class="row g-3" action="order-recap.php" method="post" enctype="multipart/form-data">
                <?php echo '<span class="col-12" style="color:red;">' . $_SESSION["upload_msg"] . '</span>'; ?>
                <div class="col-md-6"><label class="form-label" for="source_language">Source Language</label>
                    <select class="form-control" name="start_language" required>
                        <option disabled selected value> -- select language -- </option>
                        <option value="English">English</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Portuguese">Portuguese</option>
                        <option value="Spanish">Spanish</option>
                        <option value="German">German</option>
                        <option value="French">French</option>
                        <option value="Italian">Italian</option>
                    </select>
                </div>
                <div class="col-md-6"><label class="form-label" for="target_language">Target Language</label>
                    <select class="form-control" name="target_language" required>
                        <option disabled selected value> -- select language -- </option>
                        <option value="English">English</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Portuguese">Portuguese</option>
                        <option value="Spanish">Spanish</option>
                        <option value="German">German</option>
                        <option value="French">French</option>
                        <option value="Italian">Italian</option>
                    </select>
                </div>
                <div id="document-upload">
                    <div class="col-12"><label class="form-label" for="word_count">Word Count</label>
                        <input required class="form-control" type="number" id="word_count" name="word_count" min="50">
                    </div>
                    <div class="col-12">
                        <label id="file-label" class="form-label">File to be Translated</label>
                        <input required type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="order-btn" name="create-order">Confirm</button>
                </div>
            </form>
            <?php
            if (!empty($_FILES)) {
                $file_name = $_FILES['fileToUpload']['name'];
                $file_extention = strrchr($file_name, ".");

                $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];
                $file_destination = '../files/' . $file_name;

                $authorised_extentions = array('.pdf', '.PDF');


                if (in_array($file_extention, $authorised_extentions)) {
                    if (move_uploaded_file($file_tmp_name, $file_destination)) {
                        $req = $db_upload->prepare('INSERT INTO files (file_name, file_url) VALUES(?,?)');
                        $req->execute(array($file_name, $file_destination));
                        echo 'File successfully uploaded.';
                    } else {
                        echo 'There was an error while sendind the file.';
                    }
                } else {
                    echo 'Only PDF formats are authorised!';
                }
            }
            ?>
        </div>
    </section>
</main>

<?php
include "footer.php";
?>