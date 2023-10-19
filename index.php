<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup/signup_view.inc.php';
require_once 'includes/login/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport"  content="width=device-width,
      initial-scale=1.0">
      <title>E-SHOP</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <h1>E-SHOP</h1>

    <h7>
        Login administrator: admin <br>
        Password: admin <br><br>
        Login user: Marko <br>
        Password: 123 <br><br>
        Login user: Test1 <br>
        Password: test1 <br><br>
    </h7>
    


    <div class="box">
      
        <div class="form1_css">
          <h3>Login</h3>
          <form action="includes/login/login.inc.php" method="post">
            <div><input class="field1_css" type="text" name="username" 
              placeholder="Username"></div>
            <div><input class="field1_css" class="field_css" type="password" 
              name="pwd" placeholder="Password"></div>
            <div class="but_css"><button class="button1_css">Login</button>
            </div>
          </form> 
          <?php 
          check_login_errors();
          ?>
        <div> 

          

        <div class="form2_css">
          <h3>Signup</h3>
          <form action="includes/signup/signup.inc.php" method="post">
            <div><input class="field2_css" type="text" name="username" 
              placeholder="Username" ></div>
            <div><input class="field2_css" type="password" name="pwd" 
              placeholder="Password"></div>
            <div class="but_css"><button  class="button2_css">Signup</button>
            </div>
          </form>
          <?php
          check_signup_errors();
          ?>
        <div>
    </div>
</body>
</html>
 