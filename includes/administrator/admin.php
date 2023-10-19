<?php
require_once '../config_session.inc.php';
require_once 'create_item_view.inc.php';
require_once 'update_item_view.inc.php';
require_once 'delete_item_view.inc.php';
?>

<?php 
try{
    require_once "../dbh.inc.php";


   $query = "SELECT * FROM items WHERE 1;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results= $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;


} catch (PDOExpection $e){
    die("Query failed: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width,
    initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <link rel="stylesheet"  href="STYLE_admin/reset.css"> 
    <link rel="stylesheet"  href="STYLE_admin/main.css">
</head>

<body>

    <div class="main_header">
        <div class="logo_css">
          <p>LOGO</p>
        </div>

        <div class="menu">
            <ul>
                <li>Administrator page</li>
            </ul>
        </div>
    
        <div class="logout_css">
            <form action="../logout.inc.php" method="post">
                <div class="logout_css_but"><button>LOGOUT</button></div>
            </form>
        </div>
    </div>
  

    <h4>ITEMS</h4>

<section class="section1">

    
    <div class="box">
        <h3>CREATE ITEM</h3>
        <form class="form_css" action="create_item.inc.php" method="post"><br>
            <input class="field_css" type="number" name="item_number" 
                placeholder="Item number"><br>
            <input class="field_css" type="text" name="item_name" 
                placeholder="Name"><br>
            <input class="field_css" type="text" name="item_description" 
                placeholder="Description"><br>
            <input class="field_css" type="number" name="item_quantity" 
                placeholder="Quantity"><br>
            <div class="but_css"><button class="button_css">Create</button>
            </div><br>
            <?php
            check_create_item_errors();
            ?>
        </form>
        
    </div>

    
    <div class="box">
        <h3>UPDATE ITEM</h3>
        <br>
        <p>(the item number cannot be changed)</p>
        <form class="form_css" action="update_item.inc.php" method="post"><br>
            <input class="field_css" type="number" name="item_number" 
                placeholder="Item number"><br>
            <input class="field_css" type="text" name="item_name" 
                placeholder="Name"><br>
            <input class="field_css" type="text" name="item_description" 
                placeholder="Description"><br>
            <input class="field_css" type="number" name="item_quantity" 
                placeholder="Quantity"><br>
            <div class="but_css"><button class="button_css">Update</button>
            </div><br>
            <?php
            check_update_item_errors(); 
            ?>
        </form>
    </div>

    
    
    <div class="box">
        <h3>DELETE ITEM</h3>
        <form class="form_css" action="delete_item.inc.php" method="post"><br>
            <input class="field_css" type="number" name="item_number" 
                placeholder="Item number"><br>
            <div class="but_css"><button class="button_css">Delete</button>
            </div><br>
        </form>
        <?php
        check_delete_item_errors();
        ?>
    </div>  
</section>

<section class="section2">
<?php     
        foreach ($results as $row) {
          echo "<div class='results_box'>";
          echo "<div class='results_box_1'>" . 
            htmlspecialchars($row["item_number"]) . "</div>";
          echo "<div class='results_box_mid'>";
          echo "<div class='results_box_2'>" . 
            htmlspecialchars($row["item_name"]) . "</div>";
          echo "<div class='results_box_3'>" . 
            htmlspecialchars($row["item_description"]) . "</div>";
          echo "</div>";
          echo "<div class='results_box_4'>" . 
            htmlspecialchars($row["item_quantity"]) . "pc" .  "</div>";
          echo "</div>";
        }
     ?>
</section>

  </body>
</html>
 