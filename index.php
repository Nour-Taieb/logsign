<?php
require_once "includes/config_session.inc.php";
require_once 'includes/dbh.inc.php';
require_once 'includes/signup_modal.inc.php';
require_once 'includes/signup_contr.inc.php';
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h3>Login</h3>
    <form action="includes/login.inc.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <?php
    hello_login_errors();
    ?>
    <h3>Signup</h3>
    <form action="includes/signup.inc.php" method="POST">
        <?php
        hello_inputs();
        ?>
        <button type="submit">Signup</button>
        <?php check_signup_errors(); ?>
    </form>
</div>

</body>
</html>


