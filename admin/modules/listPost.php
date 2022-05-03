<?php
    include('../conn.php');
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DANH SÁCH BÀI VIẾT
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-borderless table-responsive card-1 p-4">
            <thead>
                <tr class="border-bottom">
                    <th>ID</th>
                    <th>Tên bài viết</th>
                    <th>Ảnh bài viết</th>
                    <th>Mô tả</th>
                    <th>Thời gian</th>
                    <th>
                        Cập nhật
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                // $productquery = "SELECT * FROM `product`";
                $listPost = "SELECT * FROM `posts`";
                $result = mysqli_query($connect, $listPost);
                while ($row = mysqli_fetch_array($result)) { ?>
                <tr class="border-bottom">
                    <td><?php echo $row["post_id"] ?></td>
                    <td><?php echo $row["title"] ?></td>
                    <td style="width: 25%"><img class="w-50 h-50" src="../upload/<?php echo $row["thumbnail"] ?>"></td>
                    <td><?php echo $row["description"] ?></td>
                    <td><?php echo $row["date_time_create"] ?></td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-success me-1" href="?module=editPost&id=<?php echo $row["post_id"] ?>" name="update">Edit</a>
                        <a class="btn btn-danger ms-1" href="?module=deletePost&id=<?php echo $row["post_id"] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" name="remove">Delete</a>
                    </td>
                </tr>
            <?php }
            ?>
            </tbody>
    </div>
</div>