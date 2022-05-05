<?php
    ob_start();
    session_start();
    include('header.php');
    include('conn.php');
    if (!isset($_SESSION["login"])) {
        header("location: login.php");
    }

    if (isset($_POST['update'])) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $userId = $_SESSION["login"]["0"];
        
        $sql = "UPDATE user SET fullname='$fullname', phone='$phone' WHERE user_id = '$userId'";
        $result = mysqli_query($connect, $sql);
        header('location: profile.php?success=Cập nhật thông tin thành công!');
        $userId = '';
        $fullname = '';
        $phone = '';
        $_POST['fullname'] = '';
        $_POST['phone'] = '';
        }
?>
<body>
    <div class="info__container">
        <div class="info__wrap">
        

        <h2><i class="fas fa-address-card"></i>Thông tin tài khoản</h2>
        <?php
                if(isset($_GET['success'])){ ?>
                    <p style="background-color: #01CE69; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['success']; ?></p>
        <?php  }
            $userId = $_SESSION["login"]["0"];
            $sql1 = "SELECT * FROM user WHERE user_id = '$userId'";
            $result = mysqli_query($connect, $sql1);
            $row = mysqli_fetch_array($result);
        ?>
        <form action="" method="post">
            <div class="info__group">
                <label for=""><i class="fas fa-user"></i>Tên tài khoản</label>
                <input type="text" name="username" disabled value="<?php echo $row["username"]; ?>" placeholder="Username">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-unlock-alt"></i>Mật khẩu</label>
                <input type="password" name="password" disabled value="" placeholder="Password">
                <a href="changepass.php?id=<?= $userId ?>" class="change-pass">Đổi mật khẩu</a>
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-user-tag"></i>Vai trò</label>
                <input type="text" name="role" disabled value="<?php if ($row["role"] == 1) echo "Admin"; else echo "Người dùng"; ?>" placeholder="người dùng hoặc admin">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-envelope"></i>Email</label>
                <input type="email" name="email" disabled value="<?php echo $row["email"]; ?>" placeholder="123@gmail.com">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-signature"></i>Họ và tên</label>
                <input type="text" name="fullname"  value="<?php echo $row["fullname"]; ?>" placeholder="VD: Nguyễn Duy Thuận">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-phone"></i>Số điện thoại</label>
                <input type="text" name="phone" value="<?php echo $row["phone"]; ?>" placeholder="VD: 0973843550">
            </div>
            <div class="info__group">
                <button type="submit" class="update-btn" name="update">Cập nhật thông tin</button>
            </div>
            
        </form>
        </div>
    </div>
</body>
<?php
    include('footer.php');
?>