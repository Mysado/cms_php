<?php require './app/views/partials/head.php';?>
<?php require './app/views/partials/noSession.php';?>
<?php require './app/views/partials/navAdmin.php'; ?>
    <h1>Dodaj handlowca</h1>

	<form method="post" action="/addSeller">
	    <input type="text" name="email" required>Email*<br>
	    <input type="password" name="password" required>Hasło*<br>
	    <input type="password" name="confirm" required>Potwierdz hasło*<br>
        <input type="text" name="name">Imie<br>
        <input type="text" name="surname">Nazwisko<br>
        <input type="text" name="phone">nr telefonu<br>
        <input type="radio" name="role" value="1">Admin
        <input type="radio" name="role" value="2" checked>Handlowiec<br>
	    <button formmethod="post" type="submit">Add Contacts</button>
	</form>
	<form method="get" action="/sellers">
        <button formmethod="get" type="submit">Go back</button>
    </form>
    <p>

        <?php
            if (isset($errors)) {
                foreach ($errors as $error) {
                    echo "{$error}";
                }
            }
        ?>
    </p>

<?php require './app/views/partials/footer.php';?>