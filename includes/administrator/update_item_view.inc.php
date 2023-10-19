<?php

declare(strict_types=1);



function check_update_item_errors() 
{
    if (isset($_SESSION['errors_update'])) {
        $errors = $_SESSION['errors_update'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';

        }

        unset($_SESSION['errors_update']);
    
} else if (isset($_GET["update"]) && $_GET["update"] === "success") {
    echo '<br>';
    echo '<p>Update success!</p>';
}
}


