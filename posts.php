<?php
    include('header.php');
    include('conn.php');
?>
<style>
    .post__container {
        margin-top: 100px;
        position: relative;
    }
    .post_wrap {
        padding-top: 30px;
        padding-bottom: 30px;
        padding-left: 50px;
    }

    .post_wrap .title,
    .post_wrap .post_content {
        text-transform: none !important;
    }

    .post_title .title{
        --val: 32px;
        font-size: var(--val);
        line-height: var(--val);
    }

    .post_info{
        width: 100%;
        text-align: right;
        margin-top: 15px;
        color: #979797;
        font-size: 14px;
    }
    .post_info .author {
        color: #979797;
    }
    .post_info p{
        display: inline;
    }
    .post_content p,
    .post_content span{
        --val: 18px;
        font-size: var(--val) !important;
        line-height: 160% !important;
        text-transform: none !important;
    }
    .post_content img {
        display: block;
        margin: 10px auto !important;
        width: 70% !important;
    }
    .post_sidebar {
        height: 500px;
        padding-top: 30px;
        padding-right: 30px;
    }
    .post_sidebar .another-posts .blog__post {
        min-height: unset;
        position: relative;
    }
    .post_sidebar .another-posts .blog__post::before {
        position: absolute;
        content: "";
        bottom: -2px;
        left: 0;right: 0;
        border-bottom: 1px solid #ccc;
    }
    .another-posts-header {
        display: block;
        font-size: 26px;
        text-transform: none !important;
        border-bottom: 2px solid #000;
        cursor: default;
        margin: 0 15px 15px;
    }
    
    .ms-15{
        margin-left: 15px;
    }
    .oppct-7{
        opacity: 0.7;
    }
</style>
<body onLoad=load()>
    <?php
        if(isset($_GET["id"])){
         $sql_sl = "SELECT * FROM `posts` WHERE post_id=".$_GET["id"];
         $listPost = mysqli_query($connect, $sql_sl);
         while ($row = mysqli_fetch_array($listPost)) { 
    ?>
    <div class="post__container row">
        <div class="post_wrap col-8">
            <div class="post_title">
                <h1 class="title"><?=$row["title"]?></h1>
            </div>
            <div class="post_info">
                <p class="author"><?=$row["author"]?>,</p>
                <p class="date-time-create"><?=$row["date_time_create"]?></p>
            </div>
            <div class="post_content">
                <?=$row["content"]?>
            </div>
        </div>

        <div class="post_sidebar col-4">
            <div class="another-posts row">
                <h3 class="another-posts-header noselect">Bài viết khác</h3>      
                <div>
                    <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql_other = "SELECT * FROM `posts` WHERE `post_id` != '$id' ORDER BY RAND() limit 4 " ;
                            $rsl_other = mysqli_query($connect, $sql_other);
                            while ($row = mysqli_fetch_array($rsl_other)) {
                    ?>
                    <div class="col-12">
                        <div class="blog__img">
                            <a href="posts.php?id=<?= $row['post_id'] ?>">
                                <img src="upload/<?=$row["thumbnail"]?>" alt="" width="100%">
                            </a>
                        </div>
                        <div class="blog__post">
                            <a href="posts.php?id=<?= $row['post_id'] ?>">
                                <h4><?=$row["title"]?></h4>
                            </a>
                        </div>
                    </div>
                    <?php }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php
         }}
    ?>
</body>

<?php
    include('footer.php');
?>