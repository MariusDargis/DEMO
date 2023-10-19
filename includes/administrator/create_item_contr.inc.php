<?php

declare(strict_types=1);

function is_item_number_empty(int|string $item_number) {
    if (empty($item_number)) {
        return true;
    } else {
        return false;
    }
}

function is_item_number_used(object $pdo, int|string $item_number) {
    if (get_item_number($pdo, $item_number)) {
        return true;
    } else {
        return false;
    }
}


function create_item(object $pdo, int|string $item_number, string $item_name, 
    string $item_description, int|string $item_quantity) {
   set_item($pdo, $item_number, $item_name, $item_description, $item_quantity);
}
 