<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navSeller.php'; ?>
    <h1>Edytuj kontakt</h1>

    <form method="post" action="/editContact" enctype="multipart/form-data">
        <select name="company_id">
            <?php foreach ($companies as $company) :?>
                <?php if($company->seller_id == apc_fetch(session_id())['id']): ?>
                    <option <?= "value={$company->id}" ?>><?= $company->name ?></option>
                <?php endif; ?>
            <?php endforeach;?>
        </select>Firma 
        <button type="submit" form="addCompany">Add Company</button> <br>

        <input type="text" name="name" <?= "value={$contact->name}" ?> required>Name*<br>
        <input type="text" name="surname" <?= "value={$contact->surname}" ?> required>Surname*<br>
        <input type="text" name="position" <?= "value={$contact->position}" ?> >Position*<br>
        <input type="text" name="phone" <?= "value={$contact->phone}" ?> required>Phone*<br>
        <input type="email" name="email" <?= "value={$contact->email}" ?> required>email*<br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="checkbox" name="data_agreement" value="1" required>Data agreement* <br>
        <input type="checkbox" name="marketing_agreement" value="1">Marketing agreement<br>
        <input type="text" hidden="true" name="id" <?= "value={$contact->id}" ?> >
        <select name="seller_id">
            <?php foreach ($sellers as $seller) :?>
                <?php if($seller->id == apc_fetch(session_id())['id']): ?>
                    <option <?= "value={$seller->id}" ?>><?= $seller->email ?></option>
                <?php endif; ?>
            <?php endforeach;?>   
        </select>Handlowiec <br>
        <button formmethod="post" type="submit">Edit Contact</button>
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