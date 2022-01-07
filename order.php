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
            <!-- Form to select start language  -->
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
                <!-- Form to select destination language -->
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
                <!-- Form to upload document -->
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
        </div>
    </section>
</main>

<?php
include "footer.php";
?>