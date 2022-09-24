<?php
include 'db_conn.php';
$query11 = $conn->query("select SCHEDULE_ID, SOURCE, DESTINATION,DEPARTURE_TIME, ARRIVAL_TIME from SCHEDULE;"); // Run your query


?>

<!-- JQuery -->
<script type="text/javascript"  src="jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
  $("#select").on("change",function(){
    
    var select=$("#select").val();

    // var fdata = {
    //   'name':'Ali',
    //   'roll_no':123
    // };
    // if(select!=1)
   $.ajax({
      url:'scheduleManager_Add.php',
      type:'POST',
      data:{input:select},
      success:function(data){

       $("#bus_id").html(data);
        
    }
   
   
  });

  });
});
    
    </script>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Schedule Manager</title>
    

    
      <link rel="stylesheet" href="scheduleManager.css">
  
    </head>
  <body>
    <form class="signup" action="scheduleManager_Add.php" method="post">
      <h1>Schedule Manager</h1>

    <div class="textbox">
      <?php
        echo '<select name="schedule_id" id="id" required>'; // Open your drop down box
        // Loop through the query results, outputing the options one by one
        while ($row = $query11->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="'.$row['SCHEDULE_ID'].'">'.$row['SOURCE'].' - '.$row['DESTINATION'].' - '.$row['DEPARTURE_TIME'].' - '.$row['ARRIVAL_TIME'].'</option>';
        }
        echo '</select>';// Close your drop down box
      ?>
    </div>

    <div class="textbox">    
        <input type="date"  name="date" id="select" required>
    </div>

    <div class="textbox">
        <input type="integer" placeholder="Seating Capacity" name="available_seat" value="" required>
    </div>


    <div class="textbox">
     
      <select name="bus_id" id="bus_id" required>
        <option value="">
          select Bus
        </option>
        </select>
    </div>

    <!-- <div> -->
      <button id="submit" type="submit" name="scheduleManager_button">Submit</button>
    <!-- </div> -->
   
    
    
    </form>
 <img src="manager.svg" alt="" >
  </body>
</html>


