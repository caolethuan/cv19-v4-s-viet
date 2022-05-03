<?php
    include('header.php');
    include('sendmail.php');
?>
<body onload=load()>
    <section class="contact">
        <div class="contact__container">
            <div class="contact__info">
                <div>
                    <h2>Contact Info</h2>
                    <ul class="info">
                        <li>
                            <span><i class="fas fa-map-marked-alt"></i></span>
                            <span>886/50B Xô Viết Nghệ Tĩnh, Phường 21, Quận Bình Thạnh, TP. Hồ Chí Minh</span>
                        </li>
                        <li>
                            <span><i class="fas fa-envelope"></i></span>
                            <span>1951120153@sv.ut.edu.vn</span>
                        </li>
                        <li>
                            <span><i class="fas fa-phone-alt"></i></span>
                            <span>0562 992 490</span>
                        </li>
                    </ul>
                </div>
                <ul class="sci">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-github"></i></a></li>
                </ul>
            </div>
            <div class="contactForm">
                
                <h2>Send a message</h2>
                <!--alert messages start-->
                <?php echo $alert; ?>
                <!--end alert messages start-->
                <form method="post" action="" class="formBox">
                        <div class="inputBox w50">
                            <input type="text" name="first_name" required>
                            <span>First Name</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="last_name" required>
                            <span>Last Name</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="email" required>
                            <span>Email Address</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" name="phone" required>
                            <span>Phone Number</span>
                        </div>
                        <div class="inputBox w100">
                            <textarea name="message" required></textarea>
                            <span>Your message</span>
                        </div>
                        <div class="inputBox w100">
                            <input type="submit" value="Send" name="send">
                        </div>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Refresh empty form -->
    <script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>
<?php
    include('footer.php');
?>