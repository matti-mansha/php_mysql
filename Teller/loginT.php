<?php
session_start();
?>
<?php
include 'db_conn.php';


$error_message = "";
if (isset($_POST['login_teller_check_button'])) {

  $LOGIN_TELLER =  $_POST['teller_user'];
  $PASSWORD_TELLER =  $_POST['teller_password'];

  $query_13 = $conn->prepare("select * from user where USER_USERNAME = ? and USER_PASSWORD = ?");
  $query_13->execute([$LOGIN_TELLER, $PASSWORD_TELLER]);
  $result = $query_13->fetchAll(PDO::FETCH_ASSOC);


  $var = "";
  $error_message = "";

  foreach ($result as $key => $value) {
    $var = $value["USER_USERNAME"];
  }


  if ($var == $LOGIN_TELLER) {
    // $_SESSION["tellerUser"] = $LOGIN_TELLER;
    // $_SESSION["tellerPwd"] = $PASSWORD_TELLER;
    // print_r($_SESSION);

    //FOR TERMINAL ID
    $query_l4 = $conn->query(" select TERMINAL_ID from user where USER_USERNAME like '$LOGIN_TELLER';");
    $result_terID = $query_l4->fetchAll();
    $terID = $result_terID[0];
    $terID = $terID[0];
    echo $terID;


    //FOR TERMINAL CITY
    $query_l5 = $conn->query(" select TERMINAL_CITY from TERMINAL where TERMINAL_ID = '$terID';");
    $result_terCITY = $query_l5->fetchAll();

    $terCITY = $result_terCITY[0];
    $terCITY = $terCITY[0];
    echo $terCITY;
    $_SESSION["terminalCITY"] = $terCITY;

    // print_r($result_terCITY);



    header('Location: after_loginTeller.php'); //can change to required one
  } else {
    $error_message = "Invalid username or password";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Log in Teller</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

  <!-- login -->
  <form class="login" action="loginT.php" method="post">
    <h1>Login</h1>
    <?php echo $error_message; ?>

    <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" placeholder="Username" name="teller_user" value="" required>
    </div>
    <div class="textbox">
      <i class="fas fa-key"></i>
      <input type="password" placeholder="Password" name="teller_password" value="" required>

    </div>

    <button type="submit" name="login_teller_check_button" class="btn">Login</button>


  </form>
</body>

</html>