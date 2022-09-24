<?php
     $dest=$_POST['input'];
   
        include 'db_conn.php';
        if(isset($_POST['input'])){

            $qur_2=$conn->query(" select distinct(destination)  from schedule where destination != '$dest'");
            // $result_2=$qur_2->fetchAll();
                    //     foreach($result_2 as $key=>$value)
                    
                    while ($result_2 = $qur_2->fetch(PDO::FETCH_ASSOC)) 
                     {
                        echo '<option value="'.$result_2['destination'].'">'.$result_2['destination'].'</option>';
                    }
        }
     
// echo '<pre>';
// print_r($result_2);

?>