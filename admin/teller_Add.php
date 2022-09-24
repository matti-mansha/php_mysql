

<?php
    include 'db_conn.php';

    if (isset($_POST['user_Add_button']))
    {
        $USER_USERNAME =  $_POST['teller_user'];
        $USER_PASSWORD =  $_POST['teller_pass'];
        $USER_FULLNAME =  $_POST['teller_name'];
        $USER_PHONE =  $_POST['teller_phone'];
        $USER_CNIC =  $_POST['teller_nic'];
        // $TERMINAL_ID =
        $TERMINAL_ID = $_POST['terminal'];

        $query_5 = $conn->prepare("insert into user values(?,?,?,?,?,?,?,?)");
        $query_5 -> execute([0, $USER_USERNAME, $USER_PASSWORD, $USER_FULLNAME, $USER_PHONE, "Teller", $USER_CNIC, $TERMINAL_ID]);
    }

    include 'teller.php';
    include 'admni.html';



?>
