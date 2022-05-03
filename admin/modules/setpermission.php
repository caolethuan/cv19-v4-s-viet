<?php
    ob_start();
    include('../conn.php');
    if (!empty($_GET["id"])) {
        if (isset($_POST['set'])) {
            $role = isset($_POST["role"]) ? 1 : 0;
            $sql_set = "UPDATE `user` SET `role`='$role' WHERE `user_id`=" . $_GET["id"];
            mysqli_query($connect, $sql_set) or die("Lỗi cấp quyền!");
        }
}
?>

<div class="card">
  <div class="card-header d-flex justify-content-between">
    <h5>Cấp quyền</h5>
    <a href="index.php?module=listaccount" class="btn btn-warning">Back</a>
  </div>
  <div class="card-body">
    <h5 class="card-title">Tên tài khoản</h5>
    <form class="card-text" action="" method="POST">
        <div class="form-group">
            <select  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="permission" id="permission">
                <?php
                $sql_sl = "SELECT * FROM `user` WHERE `user_id`=" . $_GET["id"];
                $sql_rsl = mysqli_query($connect, $sql_sl);
                $row = mysqli_fetch_array($sql_rsl);
                ?>
                <option value="<?php echo $row["username"] ?>"><?php echo $row["username"] ?></option>
            </select>
            <label for="" class="form-check-label" for="flexSwitchCheckDefault"><input type="checkbox" id="flexSwitchCheckDefault" class="form-check-input" name="role" <?php if (isset($row) && $row["role"] == 1) { ?> checked <?php } ?>><span class="ms-2">Admin</span></label><br>
            <input class="btn btn-primary mt-3" id="setpermission" type="submit" name="set" value="Xác nhận" style="color:#fff; background-color:#0B5ED7; width: 100px; border: 1px solid #0B5ED7;">
        </div>
    </form>
  </div>
</div>
