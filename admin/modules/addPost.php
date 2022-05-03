<?php
    ob_start();
    include('../conn.php');
 
    if (isset($_POST['add_Post'])) {
        $name = $_POST["postName"];
        $img = $_FILES['image_thumbnail']['name'];
        $description = $_POST["post_description"];
        $author = $_POST["author"];
        if ($img != null) {
            $path = "../upload/";
            $tmp_name = $_FILES['image_thumbnail']['tmp_name'];
            $img = $_FILES['image_thumbnail']['name'];

            move_uploaded_file($tmp_name, $path . $img);
            $sql = 'INSERT INTO `posts` (`title`,`thumbnail`,`description`,`date_time_create`,`author`) VALUES("'.$name.'","'.$img.'","'.$description.'","'.date("Y-m-d H:i:s").'","'.$author.'")';
            mysqli_query($connect, $sql);
            $message = "Thêm bài viết thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('location: index.php?module=listPost'); 
        } else {
            $message2 = "Chưa chọn ảnh!";
            echo "<script type='text/javascript'>alert('$message2');</script>";
        }
    }
?>
<div class="card">
  <div class="card-header d-flex justify-content-between">
    <h5>Thêm bài viết</h5>
    <a href="index.php?module=dashboard" class="btn btn-warning">Back</a>
  </div>
  <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tiêu đề bài viết</span>
                <input type="text" name="postName" class="form-control" placeholder="title..." aria-label="title..." aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Ảnh</label>
                <input type="file" class="form-control" id="inputGroupFile01" name="image_thumbnail">            
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="post_description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tác giả</span>
                <input type="text" name="author" class="form-control" placeholder="name..." aria-label="name..." aria-describedby="basic-addon1" value="  <?php
                 if (isset($_SESSION["login"]) && $_SESSION["login"]["6"] == 1) {
                    echo $_SESSION["login"]["5"];
                 } 
            ?>">
            </div>
            <input id="addPost" class="btn btn-primary mt-3"  type="submit" name="add_Post" value="Thêm mới">
        </div>
    </form>
  </div>
</div>
