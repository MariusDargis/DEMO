<?php

declare(strict_types=1);



function check_delete_item_errors() 
{
    if (isset($_SESSION['errors_delete'])) {
        $errors = $_SESSION['errors_delete'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';

        }

        unset($_SESSION['errors_delete']);
    
} else if (isset($_GET["delete"]) && $_GET["delete"] === "success") {
    echo '<br>';
    echo '<p>Item deleted!</p>';
}
}


