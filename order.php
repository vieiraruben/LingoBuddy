<?php

$pageTitle = "order";
include "header.php";
session_start();
$_SESSION['array'] = NULL;

?>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Your order</h2>
                <p>Select if you need a translator or/and a document translation</p>
            </div>
            <form action="order-confirmation.php" methode="get">                
                <label>Do you need a translator : </label>
                <label for = "yes">yes</label>
                <input type = "checkbox" id="yes" name = "yes" value="yes-checked"> </input>
                <label for = "yes">no</label>
                <input type = "checkbox" id="no" name = "no" value="no-checked"> </input>

                <label>Which is the start language</label>
                    <select name="start_language" id="start-language">
                        <option value="none"> Select a language</option>         
                        <option value="english"> English</option>
                        <option value="portuguese">Portuguese</option>
                        <option value="espagnol">Espagnol</option>
                        <option value="German">German</option>
                        <option value="french">French</option>
                        <option value="italian">Italian</option>                   
                    </select>  

                <label>Which is the destination language</label>
                   <select name="destination_language" id="destination-language">  
                        <option value="none"> Select a language</option>        
                        <option value="english"> English</option>
                        <option value="portuguese">Portuguese</option>
                        <option value="espagnol">Espagnol</option>
                        <option value="German">German</option>
                        <option value="french">French</option>
                        <option value="italian">Italian</option>                   
                    </select>
                    
                    <input type="submit" value="valider">

              <!--  <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control" type="text" id="name" name="name"></div>
                <div class="mb-3"><label class="form-label" for="subject">Subject</label><input class="form-control" type="text" id="subject" name="subject"></div>
                <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email"></div>
                <div class="mb-3"><label class="form-label" for="message">Message</label><textarea class="form-control" id="message" name="message"></textarea></div>
                <div class="mb-3"><button class="btn btn-primary" type="submit">Send</button></div>
            -->
            </form>
            <form action="order-confirmation.php" method="post" enctype="multipart/form-data">
                <label>Select a document to upload:</label> 
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload document" name="submit">
            </form>
            <?php 
            if(!empty($_FILES)){
                $file_name = $_FILES['fileToUpload']['name'];
                $file_extention = strrchr($file_name, ".");

                $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];
                $file_destination = '../files/'.$file_name;

                $authorised_extentions = array('.pdf', '.PDF');


                if(in_array($file_extention, $authorised_extentions)){
                    if(move_uploaded_file($file_tmp_name, $file_destination)){
                        $req = $db_upload->prepare('INSERT INTO files (file_name, file_url) VALUES(?,?)');
                        $req-> execute(array($file_name, $file_destination));  
                        echo 'File has been successfully uploaded';
                    } else {
                        echo 'There was an error while sendind the file ';
                    }
                }else {
                    echo 'Only PDF format are authorised !';
                }
            }
            ?>
        </div>
    </section>
</main>

<?php
include "footer.php";
?>