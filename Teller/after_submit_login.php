<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>


<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $(".select").click(function() {

      // alert($('input[type=number]').val());
      var val = $(this).attr("val");
      alert(val);

      //  alert(val);
      $.ajax({
        url: 'seats_record.php',
        type: 'POST',
        data: {
          bc: val
        },
        success: function(data) {
          $("body").html(data);
        }
      });



    });
  });
</script>

<body>


  <?php
  echo '<link rel="stylesheet" href="after_login_fetch_data.css">';
  include 'db_conn.php';
  $dest = $_POST['destination'];
  $source = $_POST['source'];
  $date = $_POST['date-input'];
  // echo $dest;
  // echo $source;
  // echo $date;
  $cus = $conn->query("select schedule_id,SCHEDULE_MANAGER_ID,source,destination,departure_time,arrival_time,schedule_fare,_date,available_seat,bus_id from schedule natural join schedule_manager
    where source='$source' AND destination= '$dest' AND _date='$date';");

  echo '<table id=customers method="POST">';
  echo '<tr>';

  echo '<th>' . 'Source' . '</th>';
  echo '<th>' . 'destination' . '</th>';
  echo '<th>' . 'departure_time' . '</th>';
  echo '<th>' . 'arrival_time' . '</th>';
  echo '<th>' . 'schedule_fare' . '</th>';
  echo '<th>' . '_date' . '</th>';
  echo '<th>' . 'available_seat' . '</th>';
  echo '<th>' . 'Seats' . '</th>';



  while ($final = $cus->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td>' . $final['source'] . '</td>';
    echo '<td>' . $final['destination'] . '</td>';
    echo '<td>' . $final['departure_time'] . '</td>';
    echo '<td>' . $final['arrival_time'] . '</td>';
    echo '<td>' . $final['schedule_fare'] . '</td>';
    echo '<td>' . $final['_date'] . '</td>';
    echo '<td id="calculate">' . $final['available_seat'] . '</td>';

    echo '<td>' . '<button class="select"  type="submit" name="sumbit" val="' . $final['SCHEDULE_MANAGER_ID'] . '">' . 'Book Here' . '</button>' . '</td>';


    echo '</tr>';
    $_SESSION['schedule_id'] = $final['schedule_id'];
    // print_r($_SESSION);
  }






  echo '</table>';



  ?>


  <table>
    <tr class="res">

    </tr>

  </table>


  </div>

</body>

</html>