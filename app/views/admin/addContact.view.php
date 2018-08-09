<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Dodaj kontakt</h1>

    <form method="post" action="/addContact" enctype="multipart/form-data">
        <select name="company_id">
            <?php foreach ($companies as $company) :?>
                <option <?= "value={$company->id}" ?>><?= $company->name ?></option>
            <?php endforeach;?>
        </select>Firma 
        <button type="submit" form="addCompany">Add Company</button> <br>

        <input type="text" name="name" required>Name*<br>
        <input type="text" name="surname" required>Surname*<br>
        <input type="text" name="position">Position*<br>
        <input type="text" name="phone" required>Phone*<br>
        <input type="email" name="email" required>email*<br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="checkbox" name="data_agreement" value="1" required>Data agreement* <br>
        <input type="checkbox" name="marketing_agreement" value="1">Marketing agreement<br>
        <select name="seller_id">
            <?php foreach ($sellers as $seller) :?>
                <option <?= "value={$seller->id}" ?>><?= $seller->email ?></option>
            <?php endforeach;?>   
        </select>Handlowiec <br>
        <button formmethod="post" type="submit">Add Contact</button>
    </form>
    <form method="get" action="/addCompany" id="addCompany">     
    </form>
    <form method="get" action="/contacts">
        <button formmethod="get" type="submit">Go back</button>
    </form>
    <p>

        <?php
            if (isset($errors)) {
                foreach ($errors as $error) {
                    echo $error;
                }
            }
        ?>
    </p>

<?php require './app/views/partials/footer.php';?>