<?php
    include 'db_conn.php';

    if (isset($_POST['button']))
    {
        $CUSTOMER_USERNAME =  $_POST['user'];
        $CUSTOMER_PASSWORD =  $_POST['pass'];
        $CUSTOMER_NAME =  $_POST['name'];
        $CUSTOMER_PHONE =  $_POST['phone'];
        $CUSTOMER_EMAIL =  $_POST['email'];
        $CUSTOMER_CNIC =  $_POST['nic'];
        $query_1 = $conn->prepare("insert into customer values(?,?,?,?,?,?,?)");
        $query_1 -> execute([0, $CUSTOMER_USERNAME, $CUSTOMER_PASSWORD, $CUSTOMER_NAME, $CUSTOMER_PHONE, $CUSTOMER_EMAIL, $CUSTOMER_CNIC]); 
    }
?>