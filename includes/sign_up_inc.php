<?php
   if(isset($_POST['submit'])) {
      include_once 'db_conn_inc.php';

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);

      //Error handling
      //Checking for empty inputs
      if(empty($name) || empty($email) || empty($username) || empty($password) || empty($mobile) || empty($address)) {
         header("Location: ../sign_up.php?signup=empty");
         exit();
      } else {
         //Checking for valid name
         if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            header("Location: ../sign_up.php?=name_invalid");
            exit();
         } else {
            //Checking for valid email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               header("Location: ../sign_up.php?signup=email_invalid");
               exit();
            } else {
               //Checking for existing username
               $sql = "SELECT * FROM customer WHERE customer_username='$username'";
               $result = mysqli_query($conn, $sql);
               $checkResult = mysqli_num_rows($result);

               if($checkResult > 0) {
                  header("Location: ../sign_up.php?signup=user_exists");
                  exit(); 
               } else {
                  //Hashing the password
                  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                  //Inserting user to table
                  $sql = "INSERT INTO customer (customer_name, customer_email, customer_username, customer_password, customer_mobile, customer_address) VALUES ('$name', '$email', '$username', '$hashedPassword', '$mobile', '$address');";

                  $result = mysqli_query($conn, $sql);

                  header("Location: ../login.php?signup=success");
                  exit();
               }
            }
         }
      }

   } else {
      header("Location: ../sign_up.php");
      exit();
   }
?>