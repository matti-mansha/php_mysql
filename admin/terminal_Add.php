<?php
    include 'db_conn.php';

    if (isset($_POST['terminal_add_button']))
    {
        $TERMINAL_NAME =  $_POST['terminalName'];
        $TERMINAL_CITY =  $_POST['terminalCity'];
        $TERMINAL_ADDRESS =  $_POST['terminalAddress'];
        $TERMINAL_PHONE =  $_POST['terminalPhone'];

        $query_2 = $conn->prepare("insert into terminal values(?,?,?,?,?)");
        $query_2 -> execute([0, $TERMINAL_NAME, $TERMINAL_CITY, $TERMINAL_ADDRESS, $TERMINAL_PHONE]);

    }

    include 'admni.html';
    include 'terminal.html';

    // include '/admin/admni.html';


?>
