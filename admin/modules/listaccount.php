<?php
include('../conn.php');
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Danh sách tài khoản
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>Cập nhật</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $sql_sl = "SELECT * FROM `user`";
                $listCat = mysqli_query($connect, $sql_sl);
                while ($row = mysqli_fetch_array($listCat)) { ?>

                    <tr>
                        <td><?php echo $row["user_id"] ?></td>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo $row["password"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php if($row["role"] == 1) { echo "Admin"; } if($row["role"]==0 ){ echo "User"; } ?></td>
                        <td><?php echo $row["date_create_user"] ?></td>
                        
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-primary me-1" href="?module=setpermission&id=<?php echo $row["user_id"] ?>" name="update"><i class="fas fa-user-cog"></i></a>
                            <a class="btn btn-danger ms-1" href="?module=deleteaccount&id=<?php echo $row["user_id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="remove"><i class="far fa-times-circle"></i></a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
    </div>
</div>