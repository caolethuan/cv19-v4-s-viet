<?php
    session_start();
    include('conn.php');
    header("Content-type: text/html; charset=utf-8");
    mysqli_set_charset($connect, 'UTF8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Covid-19 Website Design Tutorial</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/grid.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    
</head>
<body onLoad=load() class="loading">

<!-- header section starts  -->

<header>

    <!-- <a href="#" class="logo">c<span class="fas fa-virus"></span>ovid-19</a> -->
    <a href="index.php" class="logo">
        C<i class="bx bxs-virus-block bx-tada"></i>VID TRACKER
    </a>
    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="index.php">home</a></li>
            <li><a href="tracker.php">Tracking</a></li>
            <li><a href="blog.php">Blogs</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">contact</a></li>
            <li>
                        <div class="user__section mobile">
                        
                            <div class="profile" onclick="menuToggle()">
                                <?php
                                    if (isset($_SESSION["login"])) { ?>
                                        <h4 class="user_name">Chào!
                                                <?php echo $_SESSION["login"]["1"];
                                                ?> 
                                                <i class="fas fa-user-circle"></i>
                                                </h4>    
                                    <?php } else { ?>
                                        <a class="loginBtn-header" href="login.php">Đăng nhập</a>
                                        
                                    <?php }
                                    ?>
                            </div>


                            <?php if (isset($_SESSION["login"])) { ?>

                            
                            <div class="dropdown-menu mobile">
                                <ul>
                                <?php 
                                    if ($_SESSION["login"]["6"] == 1) { ?>
                                    <li><a href="admin/index.php"><i class="fas fa-user"></i>Admin Panel</a></li>
                                <?php } ?>
                                    <li><a href="profile.php"><i class="fas fa-user"></i>My profile</a></li>
                                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
            </li>
            <!-- <li><a href="#spread">spread</a></li> -->
        </ul>
    </nav>
    <div class="user__section pc">
            
            <div class="profile noselect" onclick="menuToggle()">
                <?php
                    if (isset($_SESSION["login"])) { ?>
                        <h4 class="user_name">Chào!
                                <?php echo $_SESSION["login"]["1"];
                                ?> 
                                <i class="fas fa-user-circle"></i>
                                </h4>    
                    <?php } else { ?>
                        <a class="loginBtn-header" href="login.php">Đăng nhập</a>
                        
                    <?php }
                    ?>
            </div>


            <?php if (isset($_SESSION["login"])) { ?>

            
            <div class="dropdown-menu pc">
                <ul>
                <?php 
                    if ($_SESSION["login"]["6"] == 1) { ?>
                    <li><a href="admin/index.php"><i class="fas fa-user"></i>Admin Panel</a></li>
                <?php } ?>
                    <li><a href="profile.php"><i class="fas fa-user"></i>My profile</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
                </ul>
            </div>
            <?php } ?>
    </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">

        <span>Covid-19</span>
        <h3>stay safe, stay home</h3>
        <p>Bảo vệ bản thân bạn và những người khác không bị COVID-19 bằng cách làm theo các lời khuyên sức khỏe mới nhất.</p>
        <a href="https://www.tpchd.org/home/showpublisheddocument/6690/637466534623870000" target="_blank" class="btn">Tìm hiểu thêm</a>

    </div>

    <div class="image">
        <img src="images/home-img.png" alt="">
    </div>

</section>

<!-- home section ends -->

<section class="protect" id="protect">

    <h1 class="heading">Cách để <span>bảo vệ</span> bản thân</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/protect-1.png" alt="">
            <h3>đeo khẩu trang</h3>
            <p>
                Khẩu trang / khăn che mặt có thể giúp giảm sự lây lan của COVID-19. Nó giúp ngăn các giọt băn lây lan khi con người nói chuyện, cười, ho hoặc hắt hơi.
            </p>
            <a href="https://vietnamese.cdc.gov/coronavirus/2019-ncov/prevent-getting-sick/prevention.html" target="_blank" class="btn">tìm hiểu thêm</a>
        </div>

        <div class="box">
            <img src="images/protect-2.png" alt="">
            <h3>Rửa tay thường xuyên</h3>
            <p>
                Rửa tay thường xuyên bằng xà phòng và nước trong tối thiểu 20 giây đặc biệt là sau khi đến khu vực công cộng hoặc sau khi xì mũi, ho hoặc hắt hơi.
            </p>
            <a href="https://vietnamese.cdc.gov/coronavirus/2019-ncov/prevent-getting-sick/prevention.html" target="_blank" class="btn">tìm hiểu thêm</a>
        </div>

        <div class="box">
            <img src="images/protect-3.png" alt="">
            <h3>Giữ khoảng cách</h3>
            <p>
                Tránh đám đông và không gian kém thông thoáng. Tránh tiếp xúc gần (ít nhất 6 feet, hoặc dài khoảng hai sải tay) với người khác.
            </p>
            <a href="https://vietnamese.cdc.gov/coronavirus/2019-ncov/prevent-getting-sick/prevention.html" target="_blank" class="btn">tìm hiểu thêm</a>
        </div>

    </div>

</section>

<!-- symtoms section starts  -->

<section class="symtoms" id="symtoms">

    <div class="content">
        <h1 class="heading">các <span>triệu chứng</span> thường gặp</h1>
        <p>
            COVID-19 tác động đến mỗi người theo những cách khác nhau. Hầu hết những người nhiễm vi-rút sẽ có triệu chứng bệnh từ nhẹ đến trung bình, các triệu chứng thường gặp nhất:
        </p>
        <ul>
            <div class="one">
                <li>sốt</li>
                <li>mệt mỏi</li>
                <li>ho</li>
            </div>
            <div class="two">
                <li>đau họng</li>            
                <li>đau nhức</li>
                <li>khó thở</li>
            </div>
        </ul>
        <a href="https://vietnamese.cdc.gov/coronavirus/2019-ncov/symptoms-testing/symptoms.html" target="_blank" class="btn">tìm hiểu thêm</a>
    </div>

    <div class="image">
        <img src="images/symptoms-img.png" alt="">
    </div>

</section>

<!-- symtoms section ends -->

<!-- prevent section starts  -->

<section class="prevent" id="prevent">

    <div class="row">

        <div class="image">
            <img src="images/dont-img.png" alt="">
        </div>

        <div class="content">
            <h1 class="heading">việc <span class="shouldnt">không nên làm</span> trong mùa dịch</h1>
            <ul>
                <li>Không ăn uống chung với nhau</li>
                <li>Không được chạm tay vào mặt hay mũi</li>
                <li>Tránh tiếp xúc với người bị ốm</li>
            </ul>
        </div>

    </div>

    <div class="row">

        <div class="content">
            <h1 class="heading">Việc <span class="should">nên làm</span> trong mùa dịch</h1>
            <ul>
                <li>Rửa tay với xà phòng trong vòng 20s</li>
                <li>Đeo khẩu trang khi ra ngoài </li>
                <li>Vệ sinh nhà cửa, không gian sống</li>
            </ul>
        </div>

        <div class="image">
            <img src="images/do-img.png" alt="">
        </div>

    </div>

</section>

<!-- prevent section ends -->

<!-- handwash section starts  -->

<section class="handwash" id="handwash">

    <h1 class="heading"><span>Rửa tay </span>đúng cách</h1>

    <div class="box-container row">

        <div class="col-4 col-md-4 col-sm-12">
            <div class="box">
                <span>1</span>
                <img src="images/hadnwash-1.png" alt="">
                <h3>cho xà phòng lên tay</h3>
            </div>   
        </div>
        <div class="col-4 col-md-4 col-sm-12">
            <div class="box">
                <span>2</span>
                <img src="images/hadnwash-2.png" alt="">
                <h3>tạo bọt</h3>
            </div>
        </div>
        <div class="col-4 col-md-4 col-sm-12">
            <div class="box">
                <span>3</span>
                <img src="images/hadnwash-3.png" alt="">
                <h3>rửa kẽ tay</h3>
            </div>
        </div>
        <div class="col-4 col-md-4 col-sm-12">
            <div class="box">
                <span>4</span>
                <img src="images/hadnwash-4.png" alt="">
                <h3>rửa mu bàn tay</h3>
            </div>
        </div>
        <div class="col-4 col-md-4 col-sm-12">
            <div class="box">
                <span>5</span>
                <img src="images/hadnwash-5.png" alt="">
                <h3>rửa sạch lại với nước</h3>
            </div>
        </div>
        <div class="col-4 col-md-4 col-sm-12">
            <div class="box">
                <span>6</span>
                <img src="images/hadnwash-6.png" alt="">
                <h3>dùng khăn giấy lau khô</h3>
            </div>
        </div>
    </div>

</section>

<!-- handwash section ends -->

<!-- spread section starts  -->

<section class="spread" id="spread">

    <h1 class="heading">Covid 19 <span>lan rộng</span> toàn thế giới bằng cách nào?</h1>

    <div class="image"></div>

</section>

<!-- spread section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box noselect">
            <div href="" class="logo">
                C<i class="bx bxs-virus-block bx-tada"></i>VID TRACKER
            </div>
            <p>
                Trang web cập nhật những thông tin mới nhất về Covid-19. Tuyên truyền rộng rãi cho mọi người về tình hình Covid-19.
                Giúp người dùng dễ dàng nắm bắt được danh sách các quốc gia đã xuất hiện trường hợp mắc virus corona mới, số lượng các ca mắc cũng như số trường hợp đã tử vong.
            </p>
        </div>

        <!-- <div class="box">
            <h3>locations</h3>
            <a href="#">india</a>
            <a href="#">USA</a>
            <a href="#">russia</a>
            <a href="#">japan</a>
            <a href="#">france</a>
            <a href="#">africa</a>
            <a href="#">spain</a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">protect</a>
            <a href="#">symtoms</a>
            <a href="#">prevent</a>
            <a href="#">handwash</a>
            <a href="#">spread</a>
        </div> -->

        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-phone"></i> 0562 992 490 </p>
            <p> <i class="fas fa-envelope"></i> 1951120153@sv.ut.edu.vn </p>
            <p> <i class="fas fa-map-marker-alt"></i> Binh Thanh District, Ho Chi Minh City </p>
            <div class="share">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="fab fa-youtube"></a>
                <a href="https://www.facebook.com/profile.php?id=100007816321885" target="_blank" class="fab fa-facebook-f"></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="fab fa-twitter"></a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="fab fa-instagram"></a>
            </div>
        </div>

    </div>

    <h1 class="credit"> created by<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"> TDT-Team </a> all rights reserved! </h1>

</section>

<!-- footer section ends -->
<!-- Loader -->
<div class="loader">
    <i class="bx bxs-virus bx-spin"></i>
</div>
<!-- End Loader -->
<!-- scroll top  -->

<a href="#home" class="scroll-top">
    <img src="images/scroll-img.png" alt="">
</a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/script.js"></script>