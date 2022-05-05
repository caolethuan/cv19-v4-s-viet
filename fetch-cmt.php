<?php
    include("conn.php");
    $id = $_POST['getpostid'];  
    $no = $_POST['getresult'];
    $sql_sl2 = "SELECT * FROM `comment`,`posts` WHERE `posts`.post_id = `comment`.post_id AND `comment`.post_id='$id' ORDER BY cmt_date_time DESC LIMIT $no,5";
    
    $rsl_sl2 = mysqli_query($connect,$sql_sl2);
    
    while($row = mysqli_fetch_array($rsl_sl2)){ ?>
        <div class="comments-has-sent">
            <div class="img_section">
                <img src="images/user_img.png" alt="user"> 
            </div>
            <div class="cmt-details">
                <p class="cmt-user-name"><?=$row["cmt_name"]?></p>
                <p class="cmt-time"><?=$row["cmt_date_time"]?></p>   
                <p><?=$row["cmt_content"]?></p>
                <?php
                    if (isset($_SESSION["login"]) && $_SESSION["login"]["6"] == 1) { ?>
                    <a id="dlt" target='_parent' href="deleteComment.php?id=<?=$row['cmt_id']?>&preid=<?=$row['post_id']?>">Xóa</a>
               <?php  } ?>
            </div>
        </div>
     <?php } 
?>