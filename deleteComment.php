<?php
    include('conn.php');
    if(isset($_GET['id']) && isset($_GET['preid'])){   
            $sql_dlt ="DELETE FROM `comment` WHERE cmt_id=".$_GET["id"];
            mysqli_query($connect,$sql_dlt);
            header('location: posts.php?id='.$_GET['preid']);      
    }
?>