<?php
declare(strict_types=1);
require_once 'dbh.inc.php';
require_once 'login.inc.php';

function get_user(object $pdo ,string $username){
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
} 