<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Edytuj handlowca</h1>

    <form method="post" action="/editSeller">
        <input type="text" name="email" required>Email*<br>
        <input type="password" name="old_pass" required>Stare hasło*<br>
        <input type="password" name="password" required>Nowe hasło*<br>
        <input type="password" name="confirm" required>Potwierdz nowe hasło*<br>
        <input type="text" name="name">Imie<br>
        <input type="text" name="surname">Nazwisko<br>
        <input type="text" name="phone">nr telefonu<br>
        <input type="radio" name="role" value="1">Admin
        <input type="radio" name="role" value="2" checked>Handlowiec<br>
        <input type="text" hidden="true" name="id" <?= "value={$seller->id}" ?> >
        <button formmethod="post" type="submit">Edit Contact</button>
    </form>
    <form method="get" action="/sellers">
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