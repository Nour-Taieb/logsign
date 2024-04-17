<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $username = $_POST["username"] ?? '';
    $pwd = $_POST["pwd"] ?? '';
    try{
        require_once 'dbh.inc.php';
        require_once 'login_contr.inc.php';
        
        // Try to include the file again
        require_once 'login_modal.inc.php';
        
        // Check if the function exists before calling it
        if (!function_exists('get_user')) {
            die('Error: get_user function not found');
        }
        
        // ERROR HANDLERS
        $errors = [];

        if ( is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in the fields!";
        }

        // Ensure that the get_user function is available
        $result = get_user($pdo, $username);
        
        if(is_username_wrong($result)){
            $errors['login_incorrect']='incorrect login info';
        }
        if(is_password_wrong( $pwd, $result["pwd"]) && is_username_wrong($result)){
            $errors['login_incorrect']='incorrect login info';
        }

        require_once 'config_session.inc.php';
        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            
            header('location:../index.php'); 
            die();
        }
        $newSessionid = session_create_id();
        $sessionid=$newSessionid ."_". $result["id"];
        session_id($sessionid);
        $_SESSION["user_id"]=$result["id"];
        $_SESSION["user_username"]=htmlspecialchars($result["username"]);
        $_SESSION["last_regeneration"]=time();
        header('location:../index.php?login=success');
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());

    }
}else{
    header("location:../index.php");
}
?>


