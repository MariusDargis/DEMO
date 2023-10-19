<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$item_number = $_POST["item_number"];
$item_name = $_POST["item_name"];
$item_description = $_POST["item_description"];
$item_quantity = $_POST["item_quantity"];


 try {

    require_once '../dbh.inc.php';
    require_once 'create_item_model.inc.php';
    require_once 'create_item_contr.inc.php';

    // ERROR HANDLERS
    $errors = [];

    if (is_item_number_empty($item_number)){
        $errors["empty_input"] = "Fill item number!";
    }
    if (is_item_number_used($pdo, $item_number)){
        $errors["item_number_taken"] = "Item number already used!";
    }

    require_once '../config_session.inc.php';

    if ($errors) { 
        $_SESSION["errors_create"] = $errors;
        $signupData = [
            "item_number" => $item_number, 
        ];
        $_SESSION["create_data"] = $signupData;

        header("Location: admin.php"); 
        die();
    }
     
    create_item($pdo, $item_number, $item_name, $item_description, 
        $item_quantity);

    header("Location: admin.php?create=success");

    $pdo = null;
    $stmt = null;

    die();  

} catch (PDOException $e){
    die("Query failed: " . $e->getMessage());
}

} else {
header("Location: admin.php");
die();
}