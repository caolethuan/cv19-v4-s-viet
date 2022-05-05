<link rel="stylesheet" href="./css/style.css">
<?php
    include("conn.php");
    session_start();
    if (isset($_SESSION["login"])){
        if (isset($_POST['cmt_send'])){
            $cmt_name = $_POST['cmt_name'];
            $post_id = $_POST['post_id'];
            $user_id = $_SESSION['login']["0"];
            $cmt_content = $_POST['cmt_content'];
            $sql_ins = "INSERT INTO `comment`(cmt_name,cmt_content,user_id,post_id,cmt_date_time) VALUES('$cmt_name','$cmt_content','$user_id','$post_id','".date("Y-m-d H:i:s")."')";
            $rsl_ins = mysqli_query($connect,$sql_ins); 
            echo "<script>parent.location.reload();</script>";
            die;
         }
?>
<style>
    .comment-post{
        width: 100%;
        padding: 0 15px;
    }
    form .cmt-content{
        padding: 10px;
        resize: none;
        width: 100%;
        font-size: 18px;
        height: 125px;
        border-color: #dcdcdc;
        margin-bottom: 15px;
        border-radius: 3px;
        text-transform: none;
        border: 1px solid #dcdcdc;
    }
    form .cmt-sent-btn{
        min-width: 25%;
        display: block;
        padding: 15px 35px;
        background-color: var(--color-txt);
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
</style>
<body>
    <form action="comment.php" method="post" class="comment-post">
        <input type="hidden" name="cmt_name" value="<?=$_SESSION["login"]["1"]?>">
        <?php if(isset($_GET["id"])){?>
        <input type="hidden" name="post_id" value="<?=$_GET["id"]?>">
        <?php } ?>
        <textarea class="cmt-content" name="cmt_content" id="" cols="30" rows="10" placeholder="Ý kiến của bạn?"></textarea>
        <input class="cmt-sent-btn" type="submit" value="Gửi bình luận" name="cmt_send">
    </form>
        <?php } else { ?>
            <a class="login-to-cmt" href='login.php' target='_parent' style="font-size: 18px; text-decoration: none; margin: 0 15px; text-transform: none;">Đăng nhập để bình luận bài viết</a>
        <?php }  ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
        $("#load").click(function(){
            loadmore();
        });   
        });

        function loadmore()
        {
            var val = document.getElementById("result_no").value;
            var postid = document.getElementById("postid").value;
            $.ajax({
            type: 'post',
            url: 'fetch-cmt.php',
            data: {
            getresult:val,
            getpostid:postid 
        },
        success: function (response) {
            var content = document.getElementById("result_para");
            content.innerHTML = content.innerHTML+response;

            // We increase the value by 2 because we limit the results by 2
            document.getElementById("result_no").value = Number(val)+5;
        }
        });
        }
</script>
<style>
.comments-has-sent{
    display: flex;
    font-family: Arial, Helvetica, sans-serif;
    margin: 15px;
}
.comments-has-sent .img_section{
}
.comments-has-sent .img_section img{
    border-radius: 50%;
    width: 75px;
}
.cmt-user-name{
    color:#5488c7;
    font-weight: bold;
    font-size: 16px;
    display: inline;
}
.cmt-time{
    color: #444;
    font-size: 13px;
}
.cmt-count {
    display: block;
    font-size: 16px;
    padding: 15px;
    text-transform: none;
}
.cmt-details {
    padding-left: 10px;
}
.cmt-details p {
    display: block;
    padding-bottom: 10px;
}
.cmt-details .cmt-content {
    font-size: 16px;
    text-transform: none;
}
#load {
    padding: 10px 20px;
    margin-top: 20px;
    color: #fff;
    background-color: #0098d1;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
    <?php
        if(isset($_GET["id"])){
        $id = $_GET["id"];  
        $sql_sl = "SELECT * FROM `comment`,`posts` WHERE `posts`.post_id = `comment`.post_id AND `comment`.post_id='$id' ORDER BY cmt_date_time DESC LIMIT 0,5";
        $rsl_sl = mysqli_query($connect,$sql_sl);
        $sql_cnt = "SELECT * FROM `comment`,`posts` WHERE `posts`.post_id = `comment`.post_id AND `comment`.post_id='$id'";
        $rsl_cnt = mysqli_query($connect,$sql_cnt);
        $cnt = mysqli_num_rows($rsl_cnt);
        ?>
        <span class="cmt-count"><?=$cnt?> bình luận</span> 
        <div id="result_para">
        <?php 
        while($row = mysqli_fetch_array($rsl_sl)){ ?>
            <div class="comments-has-sent">
                <div class="img_section">
                    <img src="images/user_img.png" alt="user"> 
                </div>
                <div class="cmt-details">
                    <p class="cmt-user-name"><?=$row["cmt_name"]?></p>
                    <p class="cmt-time"><?=$row["cmt_date_time"]?></p>   
                    <p class="cmt-content"><?=$row["cmt_content"]?></p>
                    <?php
                    if (isset($_SESSION["login"]) && $_SESSION["login"]["6"] == 1) { ?>
                    <a style="color:red; font-size: 16px;padding: 5px 0;display: block;margin-right: 60%;" id="dlt" target='_parent' href="deleteComment.php?id=<?=$row['cmt_id']?>&preid=<?=$row['post_id']?>">Xóa</a>
               <?php  } ?>
                </div>
            </div>
            
     <?php } ?>
     </div>
        <input type="hidden" id="result_no" value="5">
        <input type="hidden" id="postid" name="post_id" value="<?=$_GET["id"]?>">
        <?php if($cnt > 5){?>
        <input type="button" id="load" value="More Comments...">
        <?php }?>
     <?php   }
    ?>
</body>

