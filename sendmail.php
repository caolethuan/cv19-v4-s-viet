<?php

    use PHPMailer\PHPMailer\PHPMailer;

    //Gửi mail
    include("./PHPMailer/src/PHPMailer.php");
    include("./PHPMailer/src/Exception.php");
    include("./PHPMailer/src/OAuth.php");
    include("./PHPMailer/src/POP3.php");
    include("./PHPMailer/src/SMTP.php");

    
    $mail = new PHPMailer(true);
    
    $alert = '';
    
    if (isset($_POST['send'])) {
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        try {
            //Server settings
            $mail->SMTPDebug = false;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '1951120153@sv.ut.edu.vn';
            $mail->Password   = 'thuan13032001';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
    
            //Recipients
            $mail->setFrom('1951120153@sv.ut.edu.vn');
            $mail->addAddress('1951120153@sv.ut.edu.vn');
    
            $mail->isHTML(true);
            $mail->Subject = 'Message Received (Contact Page)';
            $mail->Body    = '<h3> Name: ' . $fname .' '. $lname. ' <br> Phone number: '.$phone.' <br> Email: ' . $email . ' <br>Message: ' . $message . ' </h3>';
    
            $mail->send();
            $alert = '<div class = "aleart-success" style="background-color: #01CE69; border-radius: 50px; color: #fff; padding:5px 10px; text-align:center;">
                        <span>Message Sent! Thank you for contacting us.</span>
                        </div>';
        } catch (Exception $e) {
            $alert = '<div class = "aleart-error" style="background-color: #FF4A52; border-radius: 50px; color: #fff; padding:5px 10px; text-align:center;">
                        <span>' . $e->getMessage() . '</span>
                        </div>';
        }
    }
?>