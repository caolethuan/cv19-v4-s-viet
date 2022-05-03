<?php
ob_start();
include('../conn.php');
if (empty($_GET["id"])) {

    if (isset($_POST['add_product'])) {
        $name = $_POST["name_product"];
        $img = $_FILES['image_product']['name'];
        $description = $_POST["description_product"];
        $price = $_POST["price_product"];
        $cat_product = $_POST["cat_product"];
        if ($img != null) {
            $path = "../upload/";
            $tmp_name = $_FILES['image_product']['tmp_name'];
            $img = $_FILES['image_product']['name'];

            move_uploaded_file($tmp_name, $path . $img);
            $sql = "INSERT INTO `product`(`name`,`image`,`description`,`price`,`cat_id`) VALUES('$name','$img','$description','$price','$cat_product')";
            mysqli_query($connect, $sql);
            $message = "Thêm sản phẩm thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message2 = "Chưa thêm ảnh!";
            echo "<script type='text/javascript'>alert('$message2');</script>";
        }
    }
} else {
    if (isset($_POST['add_product'])) {
        $name = $_POST["name_product"];
        $img = $_FILES['image_product']['name'];
        $description = $_POST["description_product"];
        $price = $_POST["price_product"];
        $cat_product = $_POST["cat_product"];
        if ($img != null) {
            $path = "../upload/";
            $tmp_name = $_FILES['image_product']['tmp_name'];
            $img = $_FILES['image_product']['name'];

            move_uploaded_file($tmp_name, $path . $img);
            $sql = "UPDATE `product` SET `name`='$name',`image`='$img',`description`='$description',`price`='$price',`cat_id`='$cat_product' WHERE id=" . $_GET["id"];
            mysqli_query($connect, $sql);

            echo "<script>
            alert('Cập nhật sản phẩm thành công!');
            window.location.href='index.php?module=listproduct';
            </script>";
        } else {
            $sql = "UPDATE `product` SET `name`='$name',`description`='$description',`price`='$price',`cat_id`='$cat_product' WHERE id=" . $_GET["id"];
            mysqli_query($connect, $sql);
            echo "<script>
            alert('Cập nhật sản phẩm thành công!');
            window.location.href='index.php?module=listproduct';
            </script>";
        }
    }
}
?>
<style>
    table tr td {
        color: #0B5ED7;
        font-weight: 700;
    }

    table tr:last-child {
        height: 100px;
    }

    .editbtn {
        padding: 10px 50px;
        background-color: #0F90F2;
        border: 1px solid #0F90F2;
        color: #fff;
        font-weight: 700;
        transition: 0.3s;
    }

    .editbtn:hover {
        background-color: #fff;
        color: #0F90F2;
    }

    h2 {
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
    }
</style>
<div class="container-add-product" style="margin:50px 15px; padding:50px; border-radius:5px; box-shadow:0 0 30px 0 rgb(82 63 105 / 10%);">

    <h2><?= !empty($_GET["id"]) ? "SỬA SẢN PHẨM" : "THÊM SẢN PHẨM MỚI" ?></h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_GET["id"])) {
            $sqlsl = "SELECT * FROM `product` WHERE id=" . $_GET["id"];
            $result_sl = mysqli_query($connect, $sqlsl);
            $row = mysqli_fetch_array($result_sl);
        }
        ?>
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" required name="name_product" value="<?= (!empty($row) ? $row["name"] : "") ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><?php if (!empty($row["image"])) { ?>
                        <img style="width: 100px; height:100px; " src="../upload/<?= $row["image"] ?>" alt="">

                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Ảnh</td>
                <td><input type="file" name="image_product" value="<?= (!empty($row) ? $row["image"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea name="description_product" id="Article_editor" cols="50" rows="5"><?= (!empty($row) ? $row["description"] : "") ?></textarea></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="number" id="priceNum" required name="price_product" value="<?= (!empty($row) ? $row["price"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Danh mục sản phẩm</td>
                <?php
                if (!empty($_GET["id"])) { ?>
                    <?php
                    $listCat = "SELECT * FROM `category`,`product` WHERE `product`.`cat_id`=`category`.`cat_id` AND `product`.`id`=" . $_GET["id"];
                    $result = mysqli_query($connect, $listCat);
                    $row = mysqli_fetch_array($result)
                    ?>
                    <td><select name="cat_product" id="cat_select">

                            <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>

                        </select></td>
                <?php  } else {
                ?>
                    <td><select name="cat_product" id="cat_select">
                            <?php
                            $listCat = "SELECT * FROM `category`";
                            $result = mysqli_query($connect, $listCat);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>
                            <?php } ?>

                        </select></td>
                <?php } ?>
            </tr>
            <tr>
                <td><input type="submit" class="editbtn" name="add_product" value="<?= !empty($_GET["id"]) ? "Cập nhật" : "Thêm mới" ?>"></td>
            </tr>
        </table>

    </form>
</div>
<script src="../assets/ckeditor/ckeditor.js"></script>
<script>
    // Select your input element.
    var number = document.getElementById('priceNum');

    // Listen for input event on numInput.
    number.onkeydown = function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            return false;
        }
    }
    // text -area js 
    CKEDITOR.replace('Article_editor');
</script>