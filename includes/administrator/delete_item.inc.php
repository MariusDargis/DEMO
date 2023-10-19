<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $item_number = $_POST["item_number"];
  
    


 try {

    require_once '../dbh.inc.php';
    require_once 'delete_item_model.inc.php';
    require_once 'delete_item_contr.inc.php';

    // ERROR HANDLERS
    $errors = [];

    if (is_item_number_empty($item_number)){
        $errors["empty_input"] = "Fill item number!";
    }
    if (!is_item_number_used($pdo, $item_number)){
        $errors["item_number_taken"] = "Item number not exist!!!!";
    } 

    require_once '../config_session.inc.php';

    if ($errors) { 
        $_SESSION["errors_delete"] = $errors;
        $signupData = [
            "item_number" => $item_number, 
        ];
        $_SESSION["delete_data"] = $deletepData;

        header("Location: admin.php"); 
        die();
    }
     
    delete_item($pdo, $item_number);

    header("Location: admin.php?delete=success");

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