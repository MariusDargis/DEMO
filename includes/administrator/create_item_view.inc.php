<?php

declare(strict_types=1);



function check_create_item_errors() 
{
    if (isset($_SESSION['errors_create'])) {
        $errors = $_SESSION['errors_create'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';

        }

        unset($_SESSION['errors_create']);
    
} else if (isset($_GET["create"]) && $_GET["create"] === "success") {
    echo '<br>';
    echo '<p>Item created!</p>';
}
}


