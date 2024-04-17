<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    try {
        require_once 'dbh.inc.php';
        require_once 'signup_contr.inc.php';
        require_once 'signup_modal.inc.php';

        
        // ERROR HANDLERS
        $errors = [];

        if ( is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in the fields!";
        }

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }

        if (is_username_taken($pdo,$username)) {
            $errors["username_taken"] = "Username already taken!";
        }

        if (is_email_registered($pdo,$email)) { 
            $errors["email_registered"] = "Email already registered!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            $signupData=[
                "username" => $username,
                "email" => $email  
            ];
            $_SESSION['signup_data']=$signupData;
            header('location:../index.php'); 
            die();
        }
        
        add_user( $pdo,  $username,  $pwd,  $email);
        header("location:../index.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("location:../index.php");
}

?>
