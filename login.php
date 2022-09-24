<?php
session_start();
?>

<?php
include 'db_conn.php';


$error_message = "";
if (isset($_POST['login_check_button'])) {

  $LOGIN_Customer =  $_POST['user_login'];
  $PASSWORD_Customer =  $_POST['user_password'];

  $query_8 = $conn->prepare("select * from customer where CUSTOMER_USERNAME = ? and CUSTOMER_PASSWORD = ?");
  $query_8->execute([$LOGIN_Customer, $PASSWORD_Customer]);
  $result = $query_8->fetchAll(PDO::FETCH_ASSOC);


  $var = "";
  $error_message = "";

  foreach ($result as $key => $value) {
    $var = $value["CUSTOMER_USERNAME"];
  }

  if ($var == $LOGIN_Customer) {
    $_SESSION["cstid"] = $LOGIN_Customer;
    $_SESSION["PWD"] = $PASSWORD_Customer;
    print_r($_SESSION);

    header('Location: after_login.php'); //can change to required one
  } else {
    $error_message = "Invalid username or password";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Log in</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

  <!-- login -->
  <form class="login" action="login.php" method="post">
    <h1>Login</h1>
    <?php echo $error_message; ?>

    <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" placeholder="Username" name="user_login" value="" required>
    </div>
    <div class="textbox">
      <i class="fas fa-key"></i>
      <input type="password" placeholder="Password" name="user_password" value="" required>

    </div>

    <button type="submit" name="login_check_button" class="btn">Login</button>



    <a href="signup_customer.php">Signup</a>


  </form>
</body>

</html>