<?php
require_once '../config_session.inc.php';
require_once '../login/login_view.inc.php';
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
    <title>USER PAGE</title>
    <link rel="stylesheet"  href="STYLE_users/reset.css"> 
    <link rel="stylesheet"  href="STYLE_users/main.css">
</head>

<body>

<div class="main_header">
        <div class="logo_css">
          <p>LOGO</p>
        </div>

        <div class="menu">
            <ul>
                <li>Users page</li>
                <li class="user_css">
                    <?php 
                        output_username();
                    ?>
                </li>
            </ul>
        </div>
    
        <div class="logout_css">
            <form action="../logout.inc.php" method="post">
                <div class="logout_css_but"><button>LOGOUT</button></div>
            </form>
        </div>
    </div>    

    
    <h4>ITEMS</h4>

    
    <section class="section2">
<?php     
        foreach ($results as $row) {
          echo "<div class='results_box'>";
          echo "<div class='results_box_1'>" . htmlspecialchars($row["item_number"]) . "</div>";
          echo "<div class='results_box_mid'>";
          echo "<div class='results_box_2'>" . htmlspecialchars($row["item_name"]) . "</div>";
          echo "<div class='results_box_3'>" . htmlspecialchars($row["item_description"]) . "</div>";
          echo "</div>";
          echo "<div class='results_box_4'>" . htmlspecialchars($row["item_quantity"]) . "pc" .  "</div>";
          echo "</div>";
        }
     ?>
</section>

  </body>
</html>
 