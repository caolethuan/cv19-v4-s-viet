<?php
    include('conn.php');
    ob_start();
    error_reporting(0);

    session_start();

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $password_verify = md5($_POST['password-verify']);
        if ($password == $password_verify) {
            $sql1 = "SELECT * FROM user WHERE email = '$email'";
            $sql2 = "SELECT * FROM user WHERE username = '$username'";
            $result1 = mysqli_query($connect, $sql1);
            $result2 = mysqli_query($connect, $sql2);
            if (mysqli_num_rows($result1) > 0){
                $_POST['password']='';
                $_POST['password-verify']='';
                header('location: register.php?error=Email đã được đăng ký');
            } else if (mysqli_num_rows($result2) > 0) {
                $_POST['password']='';
                $_POST['password-verify']='';
                header('location: register.php?error=Tên người sử dụng đã tồn tại');
            } else {
                $sql = 'INSERT INTO user (username,password,email,role,date_create_user)
                VALUES ("'.$username.'","'.$password.'","'.$email.'","0","'.date("Y-m-d H:i:s").'")';
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    header('location: register.php?success=Tạo tài khoản thành công, đăng nhập ngay và trải nghiệm!');
                    $username ='';
                    $email = '';
                    $_POST['password'] = '';
                    $_POST['password-verify'] = '';
                } else {
                    header('location: register.php?error=Có gì đó không đúng, vui lòng thử lại!');
                }
            }
        } else {
            header('location: register.php?error=Xác nhận mật khẩu chưa đúng!');
        }
    }
?>

<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/style.css">
         
    <!--<title>Login & Registration Form</title>-->
</head>
<body id="login-regis">
    
    <div class="container active">
        <div class="forms">
            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>
                <?php
                if(isset($_GET['error'])){ ?>
                    <p style="background-color: #FF4A52; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['error']; ?></p>
              <?php  }?>
            <?php
                if(isset($_GET['success'])){ ?>
                    <p style="background-color: #01CE69; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['success']; ?></p>
              <?php  }?>
                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your user name" name="username" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm a password" name="password-verify" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="sigCheck">
                            <label for="sigCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Register now" name="register">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already have an account?
                        <a href="login.php" class="text login-link">Login now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
      const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password")
    //   signUp = document.querySelector(".signup-link"),
    //   login = document.querySelector(".login-link");

      //   js code to show/hide password and change icon
      pwShowHide.forEach(eyeIcon =>{
          eyeIcon.addEventListener("click", ()=>{
              pwFields.forEach(pwField =>{
                  if(pwField.type ==="password"){
                      pwField.type = "text";

                      pwShowHide.forEach(icon =>{
                          icon.classList.replace("uil-eye-slash", "uil-eye");
                      })
                  }else{
                      pwField.type = "password";

                      pwShowHide.forEach(icon =>{
                          icon.classList.replace("uil-eye", "uil-eye-slash");
                      })
                  }
              }) 
          })
      })

      // js code to appear signup and login form
    //   signUp.addEventListener("click", ( )=>{
    //       container.classList.add("active");
    //   });
    //   login.addEventListener("click", ( )=>{
    //       container.classList.remove("active");
    //   });

    </script>

</body>
</html>
