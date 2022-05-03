<?php
    session_start();
    include('conn.php');
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

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/grid.css">
    
</head>
<body>
    
<!-- header section starts  -->

<header>
    <!-- <a href="#" class="logo">c<span class="fas fa-virus"></span>ovid-19</a> -->
    <a href="index.php" class="logo">
        C<i class="bx bxs-virus-block bx-tada"></i>VID TRACKER
    </a>
    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">home</a></li>
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
</body>