<?php require 'partials/head.php';?>
<?php require 'partials/session.php';?>
    <h1>Login</h1>
<form method="post" action="/login">
    <input type="email" name="email" required>email
    <input type="password" name="password" required>password
    <button formmethod="post" type="submit">send</button>
    <a href="/recovery">forgotten password</a>
    <a href="/register">register</a>
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
<?php require 'partials/footer.php';?>