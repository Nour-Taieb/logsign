<?php
declare(strict_types=1);
require_once 'dbh.inc.php';

function get_username(object $pdo, string $username) {
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_user(object $pdo, string $username, string $pwd, string $email){
    $query = "INSERT INTO users (username,pwd,email) VALUES (:username, :pwd, :email);";
    $stmt = $pdo->prepare($query);
    $options=[
        'cost'=>12
    ];
    $hashedpwd=password_hash($pwd,PASSWORD_BCRYPT,$options);
    $stmt->bindParam(":username", $username );
    $stmt->bindParam(":pwd", $hashedpwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}
?>

