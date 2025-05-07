<?php

include '../koneksi_rdh.php';

// $_POST['key_id'] = 'xxx';
if ($_POST['key_id'] == 'xxx')
{

    $dark_mode  = $_POST['dark_mode_saver'];
    $user       = $_POST['user'];


    $sql = "SELECT code FROM anywhere_general_table WHERE user ='$user'";
    $conn_sql = mysqli_query($conn_rdh, $sql);
    $count    = mysqli_num_rows($conn_sql);
   
   
    if ($count > 0)
    { 
        $sql_act     = "UPDATE anywhere_general_table SET code = '$dark_mode' WHERE user ='$user'";
    }
    else           
    {   // belum bisa dipake, karena user id msh hardcode
        $sql_act = "INSERT INTO anywhere_general_table(code,user) VALUES('on','$user')";
    }
    mysqli_query($conn_rdh, $sql_act);

    $get_after_update    = mysqli_fetch_array($conn_sql);

    $take_update =  $get_after_update[code];

    $data = array(
        'status'  => '1',
        'message' => 'success',
        'data'    => array(
                'dark_mode'    => $take_update            
                    )
        );

}

 echo json_encode($data);


?>