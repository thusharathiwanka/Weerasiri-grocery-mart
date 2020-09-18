<?php
   session_start();
   
   if(isset($_POST['submit'])) {
      include_once 'db_conn_inc.php';

      //Setting up variables and escaping special characters (like sql statements)
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);
      $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
      $salary = mysqli_real_escape_string($conn, $_POST['salary']);
      $acc_no = mysqli_real_escape_string($conn, $_POST['acc_no']);
      $bank = mysqli_real_escape_string($conn, $_POST['bank']);
      $ownerPassword = mysqli_real_escape_string($conn, $_POST['current_password']);

      //Error handling
      //Checking for empty inputs
      if(empty($name) || empty($email) || empty($username) || empty($newPassword) || empty($mobile) || empty($acc_no) || empty($bank) || empty($ownerPassword)) {
         header("Location: ../admin_edit.php?edit=empty");
         exit();
      } else {
         //Checking for valid name
         if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            header("Location: ../admin_edit.php?edit=name_invalid");
            exit();
         } else {
            //Checking for valid email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               header("Location: ../admin_edit.php?edit=email_invalid");
               exit();
            } else {
               //Checking for invalid mobile number
               if(!preg_match("/^[0-9]*$/", $mobile) || strlen($mobile) != 10) {
                  header("Location: ../admin_edit.php?edit=mobile_invalid");
                  exit();
               } else {
                  if($salary < 0) {
                     header("Location: ../admin_edit.php?edit=salary_invalid");
                     exit();
                  } else {
                     //Checking if owner password correct or not
                     $sql = "SELECT * FROM admin WHERE admin_password='$ownerPassword' AND admin_type='Owner'";
                     $result = mysqli_query($conn, $sql);
                     $checkResult = mysqli_num_rows($result);

                     echo $checkResult;
                     if($checkResult <= 0) {
                        header("Location: ../admin_edit.php?edit=owner_password_invalid");
                        exit();
                     } else {
                        //Updating admin in table
                        $sql = "UPDATE admin SET admin_name='$name', admin_email='$email', admin_username='$username', admin_password='$newPassword', admin_mobileno='$mobile', admin_salary='$salary', admin_bank_acc_no='$acc_no', admin_bank='$bank' WHERE admin_username='$username'";
                        $result = mysqli_query($conn, $sql);
                        
                        if(!$result) {
                           header("Location: ../admin_edit.php?edit=unsuccess");
                           exit();
                        } else {
                           header("Location: ../admin_edit.php?edit=success");
                           exit();
                        }
                     }
                  }
               }
            }
         }
      }  
   }
?>