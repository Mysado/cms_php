<?php require 'partials/head.php';?>
<?php require 'partials/session.php';?>
    <h1>Register</h1>

    <form method="post" action="/register">

        <input type="email" name="email" required>email
        <input type="password" name="password" required>password
        <input type="password" name="confirm" required>confirm password
        <button type="submit">send</button>
        <a href="/login">login</a>
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