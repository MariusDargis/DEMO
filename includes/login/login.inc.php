<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
         require_once '../dbh.inc.php';
         require_once 'login_model.inc.php';
         require_once 'login_contr.inc.php';

    $errors = [];

    if (is_input_empty($username, $pwd)){
        $errors["empty_input"] = "Fill in all fields!";
    }
    
    $result = get_user($pdo, $username, $pwd); 

    if (is_username_pwd_wrong($result)) {
        $errors["login_incorrect"] = "Incorrect login info!";
    }
    

    require_once '../config_session.inc.php';

    if ($errors) { 
        $_SESSION["errors_login"] = $errors; 
        

        header("Location: ../../index.php"); 
        die();
    }
     
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result["id"];
    session_id($sessionId);
    
    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_username"] = htmlspecialchars($result["username"]);

    $_SESSION["last_regeneration"] = time();
    
    if ($username == "admin") {
        header("Location: ../administrator/admin.php");
        $pdo = null;
        $statement = null;

        die();

    } else {
        header("Location: ../users/users.php");
        $pdo = null;
        $statement = null;

        die();
    }

     
    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}