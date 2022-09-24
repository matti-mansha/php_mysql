<?php
    include 'db_conn.php';

    if (isset($_POST['bus_add_button']))
    {
        $PLATE_NO =  $_POST['busPalte'];

        $query_3 = $conn->prepare("insert into bus values(?,?)");
        $query_3 -> execute([0, $PLATE_NO]);
    }

    include 'bus.html';
    include 'admni.html';

?>
