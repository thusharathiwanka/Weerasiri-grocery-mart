<?php
   require_once '../vendor/autoload.php';
   include_once 'db_conn_inc.php';
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   if(isset($_POST['submit'])) {
      $email = $_POST['email'];
      
      if(empty($email)) {
         header("Location: ../forget_password.php?forget=email_empty");
         exit();
      } else {
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../forget_password.php?forget=email_invalid&email=$email");
            exit();
         } else {
            //Searching if email is in the database
            $sql = "SELECT * FROM customer WHERE customer_email='$email'";
            $result = mysqli_query($conn, $sql);
            $checkResult = mysqli_num_rows($result);

            if($checkResult > 0) {
               //Generate random password
               $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*";
               $newPassword = substr(str_shuffle($characters), 0, 10);
               $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
               
               //Updating password
               $sql = "UPDATE customer SET customer_password='$hashedNewPassword' WHERE customer_email='$email'";
               $result = mysqli_query($conn, $sql);

               if($result) {
                  $mailer = new PHPMailer();

                  //SMTP settings
                  $mailer->SMTPDebug = SMTP::DEBUG_SERVER;
                  $mailer->isSMTP();
                  $mailer->Host = "smtp.gmail.com";
                  $mailer->SMTPAuth = true;
                  $mailer->Username = "weerasirigmtest@gmail.com";
                  $mailer->Password = "weerasiri@123";
                  $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                  $mailer->Port = 587;

                  //Email settings
                  $mailer->isHTML(true);
                  $mailer->setFrom("weerasirigmtest@gmail.com", "Weerasiri Grocery Mart");
                  $mailer->addAddress($email);
                  $mailer->Subject = "Reset Password";
                  $mailer->Body = "Your password has been changed.<br>Your new password is ".$newPassword."<br>This is automatically generated password. You can change it after login";

                  if($mailer->send()){
                     header("Location: ../login.php?forget=email_send");
                     exit();
                  } else {
                     header("Location: ../forget_password.php?forget=email_not_send&email=$email");
                     exit();
                  }
               } else {
                  header("Location: ../forget_password.php?forget=password_not_changed&email=$email");
                  exit();
               }

            } else {
               header("Location: ../forget_password.php?forget=email_not_found&email=$email");
               exit();
            }
         }
      }
   }
?>