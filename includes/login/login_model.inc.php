<?php

declare(strict_types=1);

function get_user(object $pdo, string $username, string $pwd) 
{

    $query = "SELECT * FROM users WHERE username = :username and pwd = :pwd;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $pwd);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 

}


