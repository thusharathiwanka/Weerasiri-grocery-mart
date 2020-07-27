<?php
   session_start();
   
   if(isset($_POST['submit'])) {
      include_once 'db_conn_inc.php';

      //Setting up variables and escaping special characters (like sql statements)
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $type = $_POST['type'];
      
      //Error handling
      //Checking for empty inputs
      if(empty($username) || empty($password)) {
         header("Location: ../admin_login.php?login=empty");
         exit();
      } else {
         //Searching for matching username, password and type in database
         $sql = "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password' AND admin_type='$type'";
         $result = mysqli_query($conn, $sql);
         $checkResult = mysqli_num_rows($result);
         
         //Checking if there is any matching row
         if($checkResult < 1) {
            header("Location: ../admin_login.php?login=invalid");
            exit();
         } else {
            if ($row = mysqli_fetch_assoc($result)) {
               //Creating sessions and login user
               $_SESSION['admin_id'] = $row['admin_id'];
               $_SESSION['admin_username'] = $row['admin_username'];
               $_SESSION['admin_password'] = $row['admin_password'];
               $adminType = $row['admin_type'];
               
               //Redirecting admin to their account
               if($adminType == "Owner") {
                  header("Location: ../owner.php?login=success");
                  exit();   
               } else if($adminType == "HR_manager") {
                  header("Location: ../hr_manager.php?login=success");
                  exit();   
               } else if($adminType == "Delivery_manager") {
                  header("Location: ../delivery_manager.php?login=success");
                  exit();   
               } else if($adminType == "Inventory_manager") {
                  header("Location: ../inventory_manager.php?login=success");
                  exit();   
               } else if($adminType == "Supplier_manager") {
                  header("Location: ../supplier_manager.php?login=success");
                  exit();   
               } 
            } 
         }
      }
   } else {
      header("Location: ../admin_login.php");
      exit();
   }
?>