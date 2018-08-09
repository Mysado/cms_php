<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Edytuj firme</h1>

    <form method="post" action="/editCompany">
        <input type="text" name="name" <?= "value={$firma->name}" ?> required>Nazwa*<br>
        <input type="text" name="street" <?= "value={$firma->street}" ?> required>Ulica*<br>
        <input type="text" name="city" <?= "value={$firma->city}" ?> required>Miasto*<br>
        <input type="text" name="zip_code" <?= "value={$firma->zip_code}" ?> required>Kod pocztowy*<br>
        <input type="text" name="country" <?= "value={$firma->country}" ?> required>Kraj*<br>
        <input type="text" name="nip" <?= "value={$firma->nip}" ?> required>Nip*<br>
        <input type="email" name="email" <?= "value={$firma->email}" ?> required>email*<br>
        <input type="text" hidden="true" name="id" <?= "value={$firma->id}" ?> >
        <select name="seller_id">
            <?php foreach ($sellers as $seller) :?>
                <option <?= "value={$seller->id}" ?> <?php 
                    if ($seller->id == $firma->seller_id) {
                        echo " selected";
                    }
                ?> ><?= $seller->email ?></option>
            <?php endforeach;?>
            }
            
        </select>Handlowiec <br>
        <button formmethod="post" type="submit">Edit Company</button>
    </form>
    <form method="get" action="/company">
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