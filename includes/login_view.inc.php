<?php
declare(strict_types=1);
function hello_login_errors(){
    if(isset($_SESSION['errors_login'])){
        $errors=$_SESSION['errors_login'];
        echo '<div class="alert alert-danger" role="alert" >';
        echo '<h4 class="alert-heading">OHHHH!</h4>';
        echo '<p>LOGIN FAILURE!</p>';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '<hr>';
        echo '<p class="mb-0">TRY AGAIN.</p>';
        echo '</div>';
        unset($_SESSION['errors_login']);

    }else if (isset($_GET['login']) && $_GET['login'] === "success"){
        echo '<div class="alert alert-success" role="alert">';
        echo '<h4 class="alert-heading">Well done!</h4>';
        echo '<p>login success!</p>';
        echo '<hr>';
        echo '<p class="mb-0">You have successfully logged up.</p>';
        echo '</div>';
    }
}