<?php
   require_once '../vendor/autoload.php';
   include_once 'db_conn_inc.php';
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   if(isset($_POST['submit'])) {
      $email = $_POST['email'];
      echo $email;
   }
?>