<?php
  ob_start();
  session_start();
  include("conn.php");
  if (isset($_POST["login"])) {
      $userName = $_POST["username"];
      $password = md5($_POST["password"]);

      if (isset($_POST["remember"])) {
          setcookie("username", $userName);
          setcookie("password", $_POST["password"]);
      }
      $sqlLogin = "SELECT * FROM user WHERE username='$userName' AND password='$password' LIMIT 1 ";
      $result = mysqli_query($connect, $sqlLogin);
      $row = mysqli_fetch_row($result);


      if (mysqli_num_rows($result) == 0) {
          header("location: login.php?error=Sai tài khoản hoặc mật khẩu");
          exit();
      } else {
          $_SESSION["login"] = $row;
          header("location: index.php");
          exit();
      }
  }
  $userName = "";
  $password = "";
  $check = false;
  if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
      $userName = $_COOKIE["username"];
      $password = $_COOKIE["password"];
      $check = true;
  }

  // $redirectURL = "http://localhost/BakeryStore/fb-callback.php";
  // $permissions = ['email'];
  // $loginURL = $helper->getLoginUrl($redirectURL, $permissions);

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
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                <?php
                if (isset($_GET['error'])) { ?>
                <p style="background-color: #FF4A52; border-radius: 50px; color: #fff; text-align: center; padding:5px 0; margin-bottom: 10px;" class="error"><?php echo $_GET['error']; ?></p>
                <?php  }
                ?>
                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" placeholder="Username" name="username" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login Now" name="login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="register.php" class="text signup-link">Signup now</a>
                    </span>
                </div>
            </div>

        </div>
    </div>

    <script>
      const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password")
      // signUp = document.querySelector(".signup-link"),
      // login = document.querySelector(".login-link");

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
      // signUp.addEventListener("click", ( )=>{
      //     container.classList.add("active");
      // });
      // login.addEventListener("click", ( )=>{
      //     container.classList.remove("active");
      // });

    </script>

</body>
</html>
