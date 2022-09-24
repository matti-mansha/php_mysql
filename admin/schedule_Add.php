<?php
    include 'db_conn.php';

        // AJAX CALL
if (isset($_POST['input'])){
    
    $dest=$_POST['input'];
   $exp='select destination';
    
       $qur_2=$conn->query(" select terminal_city  from terminal where terminal_city not like '$dest'");

       if($dest!=" ")
       while ($result_2 = $qur_2->fetch(PDO::FETCH_ASSOC)) 
        {
           echo '<option value="'.$result_2['terminal_city'].'">'.$result_2['terminal_city'].'</option>';
       }
       else{
           echo '<option >'.$exp.'</option>';
           
       }

}
    // After clicking button
    else if (isset($_POST['schedule_Add_button']))
        {
            $SOURCE =  $_POST['source'];
            $DESTINATION =  $_POST['destination'];
            $DEPARTURE_TIME = $_POST['departure_time'];        
            $ARRIVAL_TIME =  $_POST['arrival_time'];
            $SCHEDULE_FARE =  $_POST['fare_schedue'];


            $query_10 = $conn->prepare("insert into schedule values(?,?,?,?,?,?)");
            $query_10 -> execute([0, $SOURCE, $DESTINATION, $DEPARTURE_TIME, $ARRIVAL_TIME, $SCHEDULE_FARE]); 
        }
include 'admni.html';
include 'schedule.php';

?>

