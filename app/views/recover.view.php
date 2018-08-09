<?php require 'partials/head.php';?>
<?php require 'partials/session.php';?>
    <h1>forgotten password</h1>

    <form method="post" action="/recovery">
        <input type="text" name="email">email
        <button formmethod="post" type="submit">send</button>
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