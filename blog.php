<!--header-->
<?php
    include('header.php');
    include('conn.php');
?>
<!--end header-->
<body onLoad=load()>
    <div class="blog__container" style="margin-top: 100px">
        <div class="row blog__intro">
            <div class="col-12">
                <span>Latest News</span>
                <h3>Tin tức mới nhất</h3>
                <p>Cập nhật tin tức, sự kiện nóng xung quanh vấn đề covid 19 được bạn đọc quan tâm nhất trên Covid Tracker.</p>
            </div>
            <div class="col-12 search">
                <form class="wrapper" method="GET" action="">
                    <?php 
                        $param = "";
                    //Tim kiem
                        $search = isset($_GET['post-name']) ? $_GET['post-name'] : "";
                        if ($search) {
                            $where = "AND `title` LIKE '%" . $search . "%'";
                            $param .= "post-name=" . $search . "&";
                            // $sortParam = "post-name=" . $search . "&";
                        }
                    ?>
                    <input type="text" class="search-input" placeholder="Tìm kiếm bài viết" name="post-name" value="<?= isset($_GET['post-name']) ? $_GET['post-name'] : ""; ?>">
                    <!-- <input type="submit" class="search-btn" value="Tìm kiếm"><i class="fas fa-search"></i> -->
                    <input type="submit" class="search-btn" value="Tìm kiếm">
                </form>
            </div>
        </div>
        <div class="row blog__content">
            <?php
                //phan trang
                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 3;
                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * $item_per_page;
                //truy van
                if ($search) {
                    $sql_sl = "SELECT * FROM `posts` WHERE `title` LIKE '%" . $search . "%' OR `description` LIKE '%" . $search . "%' LIMIT " . $item_per_page . " OFFSET " . $offset;
                    $listPost = mysqli_query($connect, $sql_sl);
                    $totalRecords = mysqli_query($connect, "SELECT * FROM `posts` WHERE `title` LIKE '%" . $search . "%' OR `description` LIKE '%" . $search . "%'");
                } else {
                    $sql_sl = "SELECT * FROM `posts` ORDER BY date_time_create DESC LIMIT " . $item_per_page . " OFFSET " . $offset;;
                    $listPost = mysqli_query($connect, $sql_sl);
                    $totalRecords = mysqli_query($connect, "SELECT * FROM `posts`");
                }
                $totalRecords = $totalRecords->num_rows;
                $totalPages = ceil($totalRecords / $item_per_page);
                while ($row = mysqli_fetch_array($listPost)) { 
            ?>
            <div class="col-4 col-md-6 col-sm-12">
                <div class="blog__single">
                    <div class="blog__img">
                        <a href="posts.php?id=<?= $row['post_id'] ?>">
                            <img src="upload/<?=$row["thumbnail"]?>" alt="" width="100%">
                        </a>
                    </div>
                    <div class="blog__post">
                        <a href="posts.php?id=<?= $row['post_id'] ?>">
                            <h4><?=$row["title"]?></h4>
                        </a>
                        <p>
                            <?=$row["description"]?>
                        </p>
                    </div>
                    <div class="blog__info">
                        <div class="blog__info-author">
                            <span><i class="fas fa-user"></i></span>
                            <span>Admin</span>
                        </div>
                        <div class="blog__info-cmt">
                            <span><i class="far fa-clock"></i></span>
                            <span><?=$row["date_time_create"]?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php } 
                ?>
        </div>
        <div>
            <?php
            if(mysqli_num_rows($listPost) == 0  ){
                echo "<p style='color:#444; font-size: 25px; text-align:center;'>Không tìm thấy bài viết nào!</p>";
            } 
        ?>
        </div>
        <div style="text-align: center; padding-bottom: 25px;" class="pagination">
                <?php include("pagination.php");     ?>
        </div>
    </div>
</body>

<?php
    include('footer.php');
?>