<?php

    include 'db_conn.php';
 if(isset($_POST['hidden'])){
    $id=$_POST['hidden'];
    $asd=$conn->query("select available_seat from  schedule_manager where SCHEDULE_MANAGER_ID='$id';");
    $vat=$asd->fetchAll();
    echo '<pre>';
    print_r($vat);

    
}
?>