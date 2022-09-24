<?php
    include 'db_conn.php';

    
    if (isset($_POST['input'])){
       $date= $_POST['input'];
       
           $d=$conn->query("select * from bus where bus_id not in (select bus_id from schedule_manager where _date like '$date') ;");
    //    $re = $d->fetchAll();
    //    echo '<pre>';
    //    print_r($re);
       
       while ($re=$d->fetch()) 
       {
          echo '<option value="'.$re[0].'">'.$re[1].'</option>';
      }
    }


    else if (isset($_POST['scheduleManager_button']))
    {
        $SCHEDULE_ID =  $_POST['schedule_id'];
        $_DATE =  $_POST['date'];
        $AVAILABLE_SEAT = $_POST['available_seat'];        
        $BUS_ID =  $_POST['bus_id'];


        $query_10 = $conn->prepare("insert into schedule_manager values(?,?,?,?,?)");
        $query_10 -> execute([0, $SCHEDULE_ID, $_DATE, $AVAILABLE_SEAT, $BUS_ID]); 
    }
    else
    {
        include 'scheduleManager.php';
        include 'admni.html';
    }
    


?>