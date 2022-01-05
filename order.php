<?php
include "header.php";
?>
<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Your order</h2>
                <p>Select if you need a translator or/and a document translation</p>
            </div>
            <form>                
                <label>Do you need a translator : </label>
                <label for = "yes">yes</label>
                <input type = "checkbox" id="yes" name = "yes" value="yes-checked"> </input>
                <label for = "yes">no</label>
                <input type = "checkbox" id="no" name = "yes" value="no-checked"> </input>

                <label>Which is the start language</label>
                    <select name="start-language" id="start-language">         
                        <option value="en"> English</option>
                        <option value="pt">Portuguese</option>
                        <option value="es">Espagnol</option>
                        <option value="de">German</option>
                        <option value="fr">French</option>
                        <option value="it">Italian</option>                   
                    </select>  

                <label>Which is the destination language</label>
                   <select name="destination-language" id="destination-language">         
                        <option value="en"> English</option>
                        <option value="pt">Portuguese</option>
                        <option value="es">Espagnol</option>
                        <option value="de">German</option>
                        <option value="fr">French</option>
                        <option value="it">Italian</option>                   
                    </select> 

              <!--  <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control" type="text" id="name" name="name"></div>
                <div class="mb-3"><label class="form-label" for="subject">Subject</label><input class="form-control" type="text" id="subject" name="subject"></div>
                <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email"></div>
                <div class="mb-3"><label class="form-label" for="message">Message</label><textarea class="form-control" id="message" name="message"></textarea></div>
                <div class="mb-3"><button class="btn btn-primary" type="submit">Send</button></div>
            -->
            </form>
        </div>
    </section>
</main>

<?php
include "footer.php";
?>