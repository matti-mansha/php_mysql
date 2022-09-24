<?php
    include 'db_conn.php';
    $sch_query=$conn->query(" select terminal_city from terminal;");
?>

        <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto:wght@300&display=swap" rel="stylesheet">
<script type="text/javascript"  src="jquery-3.6.0.min.js"></script>



    <script>

    $(document).ready(function(){
  $("#source").on("change",function(){
    
    var select=$("#source").val();

    // var fdata = {
    //   'name':'Ali',
    //   'roll_no':123
    // };
    if(select!=1)
   {$.ajax({
      url:'schedule_Add.php',
      type:'POST',
      data:{input:select},
      success:function(data){

       $("#destination").html(data);
        
    }
   
   
  });}
  else{
    $("#destination").html( "");
  }


  });
});
    
    </script>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Teller</title>
    <link rel="stylesheet" href="schedule.css">
  </head>
  <body>
    <form class="schedule" action="schedule_Add.php" method="post">
      <h1>Add Schedule</h1>
      <div class="">
            <?php
                echo '<select id="source" name="source" value=1>'; // Open your drop down box
                // Loop through the query results, outputing the options one by one
                echo '<option value=1>selcet source </option>';
                while ($row = $sch_query->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="'.$row['terminal_city'].'">'.$row['terminal_city'].'</option>';
                }
                echo '</select>';// Close your drop down box
            ?>
          </div>
                <select  id="destination" name="destination">
                    <option value="">Select destination</option>
                </select>
        <!-- matti -->
          <div class="textbox">

        <label>Departure time:</label>
        <input type="time" name="departure_time" required>
      </div>

      <div class="textbox">

        <label>Arrival time:</label>
        <input type="time" name="arrival_time" required>
      </div>

      <div class="textbox">
          <label >Fare</label>
        <input type="integer" placeholder="Fare" name="fare_schedue" value="" required>
            </div>

            <div>
                <button id="submit" name="schedule_Add_button">Submit</button>
          </div>
    </form>
    <!-- <div class="pic"> -->
      <img src="schedule.svg" alt="">
    
  </body>
</html>
