<?php
declare(strict_types=1);


function hello_inputs(){
    if(isset($_SESSION['signup_data']["username"]) && !isset($_SESSION["errors_signup"]["username_taken"]))   {
        echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION['signup_data']["username"] .'">';
    } else{
        echo '<input type="text" name="username" placeholder="Username">';

    }
    echo '<input type="password" name="pwd" placeholder="Password">';
    if(isset($_SESSION['signup_data']["email"]) && !isset($_SESSION["errors_signup"]["email_registered"]) && !isset($_SESSION["errors_signup"]["invalid_email"]))   {
        echo '<input type="email" name="email" placeholder="Email" value="' . $_SESSION['signup_data']["email"] .'">';
    } else{
        echo '<input type="email" name="email" placeholder="Email">';

    }
}



function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];
        echo '<div class="alert alert-danger" role="alert" >';
        echo '<h4 class="alert-heading">OHHHH!</h4>';
        echo '<p>Signup FAILURE!</p>';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '<hr>';
        echo '<p class="mb-0">TRY AGAIN.</p>';
        echo '</div>';
        unset($_SESSION["errors_signup"]);
        
    } else if (isset($_GET['signup']) && $_GET['signup'] === "success") {
        echo '<div class="alert alert-success" role="alert">';
        echo '<h4 class="alert-heading">Well done!</h4>';
        echo '<p>Signup success!</p>';
        echo '<hr>';
        echo '<p class="mb-0">You have successfully signed up.</p>';
        echo '</div>';
    }
}
?>