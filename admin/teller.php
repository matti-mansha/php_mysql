<?php
include 'db_conn.php';
$query4 = $conn->query("select TERMINAL_ID, TERMINAL_NAME from terminal"); // Run your query

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Teller</title>
    <link rel="stylesheet" href="bus.css">
  </head>
  <body>
    <form class="signup" action="teller_Add.php" method="post">
      <h1>Add Teller</h1>
      <div class="textbox">
        <input type="text" placeholder="Username" name="teller_user" value="" required> 
      </div>

      <div class="textbox">
        <input type="password" placeholder="Password" name="teller_pass" value="" required>
      </div>

      <div class="textbox">
        <input type="text" placeholder="Name" name="teller_name" value="" required>
      </div>

      <div class="textbox">
        <input type="text" placeholder="Phone" name="teller_phone" value="" required>
      </div>

      <div class="textbox">
        <input type="text" placeholder="CNIC" name="teller_nic" value="" required>
      </div>

      <div class="textbox"> <!-- Make class for drop down -->

    <?php

        echo '<select name="terminal" required>'; // Open your drop down box
        // Loop through the query results, outputing the options one by one
        while ($row = $query4->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="'.$row['TERMINAL_ID'].'">'.$row['TERMINAL_NAME'].'</option>';
        }

        echo '</select>';// Close your drop down box
    ?>
       </div>




      <button class="bt" type="submit" name="user_Add_button">Submit</button>
    </form>
    <div class="pic">
      <img src="teller.svg" alt="">
    </div>
  </body>
</html>
