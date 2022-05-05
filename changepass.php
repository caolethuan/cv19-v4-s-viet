<?php
    ob_start();
    session_start();
    include('header.php');
    if(isset($_GET["id"])){
        if(isset($_POST["change"])){
            $oldpass = md5($_POST["oldpassword"]);
            $newpass = md5($_POST["newpassword"]);
            $newpass_verify = md5($_POST["password-verify"]);
            $sql_sl = "SELECT * FROM user WHERE user_id= " .$_GET["id"];
            $sql_rsl = mysqli_query($connect,$sql_sl);
            $row = mysqli_fetch_array($sql_rsl);
            if($row["password"] == $oldpass){
                if($newpass == $newpass_verify){
                    $change_pass = "UPDATE `user` SET `password` = '$newpass' WHERE `user_id`=".$_GET["id"];
                    $change_rsl = mysqli_query($connect,$change_pass);
                    header("location: changepass.php?id=".$_GET['id']."&success=Thay đổi mật khẩu thành công!");
                } else {
                    header("location: changepass.php?id=".$_GET['id']."&error=Xác nhận mật khẩu mới chưa đúng!");
                }
            }else{
                header("location: changepass.php?id=".$_GET['id']."&error=Mật khẩu cũ chưa chính xác!");
            }
        }
    }
?>
<body>
    <div class="change-pass-container">
        <h2>đổi mật khẩu</h2>
        <form action="" method="post">
            <?php if(isset($_GET['error'])){ ?>
                    <p style="background-color: #FF4A52; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['error']; ?></p>
            <?php  }?>
            <?php if(isset($_GET['success'])){ ?>
                    <p style="background-color: #01CE69; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="success"><?php echo $_GET['success']; ?></p>
              <?php  }?>
            <div class="info__group">
                <label for=""><i class="fas fa-unlock-alt"></i>Mật khẩu cũ</label>
                <input type="password" name="oldpassword" value="" placeholder="Mật khẩu cũ">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-unlock-alt"></i>Mật khẩu mới</label>
                <input type="password" name="newpassword" value="" placeholder="Mật khẩu mới">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-unlock-alt"></i>Xác nhận mật khẩu</label>
                <input type="password" name="password-verify" value="" placeholder="Nhập lại mật khẩu mới">
            </div>
            <div class="info__group">
                <button class="update-btn" type="submit" name="change">xác nhận</button>
            </div>
        </form>
    </div>
</body>
<?php
    include('footer.php');
?>