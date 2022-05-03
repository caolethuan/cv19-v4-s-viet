<?php
ob_start();
include('../conn.php');
if (!empty($_GET["id"])) {

    if (isset($_POST['edit'])) {
        $name = $_POST["postName"];
        $img = $_FILES['image_thumbnail']['name'];
        $description = $_POST["post_description"];
        $content = $_POST["post_content"];
        $author = $_POST["author"];
        if ($img != null) {
            $path = "../upload/";
            $tmp_name = $_FILES['image_thumbnail']['tmp_name'];
            $img = $_FILES['image_thumbnail']['name'];

            move_uploaded_file($tmp_name, $path . $img);
            $sql = "UPDATE `posts` SET `title`='$name',`thumbnail`='$img',`description`='$description',`content`='$content',`author`='$author'  WHERE post_id=" . $_GET["id"];
            mysqli_query($connect, $sql);

            echo "<script>
            alert('Cập nhật bài viết thành công!');
            window.location.href='index.php?module=listPost';
            </script>";
        } else {
            $sql = "UPDATE `posts` SET `title`='$name',`description`='$description',`content`='$content',`author`='$author' WHERE post_id=" . $_GET["id"];
            mysqli_query($connect, $sql);
            echo "<script>
            alert('Cập nhật bài viết thành công!');
            window.location.href='index.php?module=listPost';
            </script>";
        }
    }
}
?>


<div class="card">
  <div class="card-header d-flex justify-content-between">
    <h5>CHỈNH SỬA BÀI VIẾT</h5>
    <a href="index.php?module=listPost" class="btn btn-warning">Back</a>
  </div>
  <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
    <?php
        if(isset($_GET["id"])){
        $sqlsl = "SELECT * FROM `posts` WHERE post_id=".$_GET["id"];
        $result_sl = mysqli_query($connect,$sqlsl);
        $row = mysqli_fetch_array($result_sl);
        }
    ?>
        <div class="form-group">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tiêu đề bài viết</span>
                <input type="text" name="postName" value="<?= $row["title"]?>" class="form-control" placeholder="title..." aria-label="title..." aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Ảnh</label>
                <input type="file" class="form-control" id="inputGroupFile01" name="image_thumbnail" value="<?=  $row["thumbnail"] ?>">           
            </div>
            <div class="mb-3">
                <?php if (!empty($row["thumbnail"])) { ?>
                    <img class="img-thumbnail" src="../upload/<?= $row["thumbnail"] ?>" alt="">
                <?php } ?> 
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label fw-bold">Description</label>
                <textarea class="form-control" name="post_description" id="exampleFormControlTextarea1" rows="3"><?= $row["description"] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label fw-bold">Content</label>
                <textarea id="content" name="post_content" class="exampleFormControlTextarea2"><?= $row["content"] ?></textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tác giả</span>
                <input type="text" name="author" value="<?= $row["author"]?>" class="form-control" placeholder="title..." aria-label="title..." aria-describedby="basic-addon1">
            </div>
            <input class="btn btn-primary mt-3"  type="submit" name="edit" value="Cập nhật">
        </div>
    </form>
  </div>
</div>

