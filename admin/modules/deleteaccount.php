<?php
    include('../conn.php');

    if(isset($_GET['id'])){   
            
            $sql_dlt ="DELETE FROM `user` WHERE `user_id`=".$_GET["id"];
            mysqli_query($connect,$sql_dlt);
            header('location: index.php?module=listaccount'); 
    }
?>