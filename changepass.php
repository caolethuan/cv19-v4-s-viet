<?php
    include('header.php');
?>
<body>
    <div class="change-pass-container">
        <h2>đổi mật khẩu</h2>
        <form action="" method="post">
            <div class="info__group">
                <label for=""><i class="fas fa-unlock-alt"></i>Mật khẩu cũ</label>
                <input type="password" name="password" value="" placeholder="Mật khẩu cũ">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-unlock-alt"></i>Mật khẩu mới</label>
                <input type="password" name="password" value="" placeholder="Mật khẩu mới">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-unlock-alt"></i>Xác nhận mật khẩu</label>
                <input type="password" name="password" value="" placeholder="Nhập lại mật khẩu mới">
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