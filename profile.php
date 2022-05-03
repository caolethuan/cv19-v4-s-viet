<?php
    include('header.php');
?>
<body>
    <div class="info__container">
        <div class="info__wrap">
        <h2><i class="fas fa-address-card"></i>Thông tin tài khoản</h2>
        <form action="" method="post">
            <div class="info__group">
                <label for=""><i class="fas fa-user"></i>Tên tài khoản</label>
                <input type="text" name="username" disabled value="" placeholder="Username">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-unlock-alt"></i>Mật khẩu</label>
                <input type="password" name="password" disabled value="" placeholder="Password">
                <a href="changepass.php?id=" class="change-pass">Đổi mật khẩu</a>
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-user-tag"></i>Vai trò</label>
                <input type="text" name="role" disabled value="" placeholder="người dùng hoặc admin">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-envelope"></i>Email</label>
                <input type="email" name="email" disabled value="" placeholder="123@gmail.com">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-signature"></i>Họ và tên</label>
                <input type="text" name="fullname"  value="" placeholder="VD: Nguyễn Duy Thuận">
            </div>
            <div class="info__group">
                <label for=""><i class="fas fa-phone"></i>Số điện thoại</label>
                <input type="text" name="phone" value="" placeholder="VD: 0973843550">
            </div>
            <div class="info__group">
                <button class="update-btn" name="update">Cập nhật thông tin</button>
            </div>
            
        </form>
        </div>
    </div>
</body>
<?php
    include('footer.php');
?>