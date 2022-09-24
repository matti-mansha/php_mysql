<?php
session_start();
?>

<html>

<head>

</head>

<body>

    <?php
    if (isset($_POST['in'])) {
        if ($_POST['in'] != "") {
            include 'db_conn.php';
            $id = $_POST['hidden'];
            $asd = $conn->query("select available_seat from  schedule_manager where SCHEDULE_MANAGER_ID='$id';");
            $vat = $asd->fetchAll();
            // echo '<pre>';
            // print_r($vat);
            $new = $vat[0];
            $new = $new[0];

            $reserve = $_POST['seat'];
            // echo $reserve;
            $remaining = $new - $reserve;
            // echo $remaining;

            $sql = "UPDATE schedule_manager SET available_seat='$remaining' WHERE schedule_manager_id='$id'";

            $stmt = $conn->exec($sql);

            // execute the query
            $var1 = $_SESSION['cstid'];
            $var2 = $_SESSION['PWD'];
            // $var3=$_SESSION['schedule_id'];
            // execute the query
            // print_r($_SESSION);
            $upd = $conn->query("select customer_id from customer where CUSTOMER_USERNAME like '$var1' and CUSTOMER_PASSWORD like '$var2';");
            $aaa = $upd->fetchAll();
            $aaa = $aaa[0];
            $aaa = $aaa[0];
            $cus_id = $aaa;
            //     //into tickets

            //     //schdule id
            $s = $conn->query("select schedule_id from schedule_manager where schedule_manager_id = '$id';");
            $sid = $s->fetchAll();
            print_r($sid);

            $sid = $sid[0];
            $sid = $sid[0];
            // echo $sid;

            //     //INSERT INTO TIKET
            $ins = "INSERT into ticket values (NULL,'$sid','$aaa','$reserve')";
            $tic = $conn->exec($ins);




            $xyz = $conn->query("select ticket_id from ticket order by ticket_id DESC limit 1 ;");
            $pay = $xyz->fetchAll();
            // print_r($pay);

            $pay = $pay[0];
            $pay = $pay[0];
            //         // echo $pay;

            $price = $conn->query("select schedule_fare from schedule where schedule_id = '$sid'");
            $fare = $price->fetchAll();
            print_r($fare);
            $fare = $fare[0];
            $fare = $fare[0];
            // echo $fare;

            //Select no of seats booked
            $num = $conn->query("select number_of_seats from ticket where ticket_id = '$pay' ");
            $seat_ = $num->fetchAll();
            // print_r($fare);
            $seat_ = $seat_[0];
            $seat_ = $seat_[0];
            $seat_ = $seat_ * $fare;
            // print_r($seat_);
            $p = 'cash';
            //Insert into payment
            $jkl = "INSERT into payment values (NULL,'$pay','$seat_','$p')";
            $ssd = $conn->exec($jkl);
        }


        session_destroy();
    }

    ?>

    <?php
    include 'db_conn.php';

    if (isset($_POST['bc'])) {
        $value = $_POST['bc'];
        echo '<h1>' . "Input Number of Seats" . '</h1>';
        $asd = $conn->query("select available_seat from  schedule_manager where SCHEDULE_MANAGER_ID='$value';");
        $asd = $asd->fetchAll();
        // print_r($_SESSION);
        $asd = $asd[0];
        $abc = $asd[0];
        echo '<form  action="seats_record.php" method="post" >';
        echo '<input type="number" min=0 max=' . $abc . ' name="seat" required>';
        echo '<input  type="submit" value="submit" name="in">';
        echo '<input  type="hidden" value=' . $value . ' name="hidden">';
        echo '</form>';
        // $dec=$conn->prepare("insert into schedule_manager(available_seat) values(?)");
        // $dec ->execute([1]);
    }






    ?>



</body>

</html>