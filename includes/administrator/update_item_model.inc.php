<?php

declare(strict_types=1);

function get_item_number(object $pdo, int|string $item_number) {
    $query = "SELECT item_number FROM items WHERE item_number = :item_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":item_number", $item_number);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
} 
 

function set_item(object $pdo, int|string $item_number, string $item_name, 
    string $item_description, int|string $item_quantity) {
    $query = "UPDATE items SET  item_number = :item_number, 
    item_name= :item_name, item_description = :item_description, 
    item_quantity = :item_quantity
     WHERE item_number = :item_number;";
    $stmt = $pdo->prepare($query);


    $stmt->bindParam(":item_number", $item_number);
    $stmt->bindParam(":item_name", $item_name);
    $stmt->bindParam(":item_description", $item_description);
    $stmt->bindParam(":item_quantity", $item_quantity);
    $stmt->execute();
}