<?php
   if(isset($_POST['submit'])) {
      include_once 'db_conn_inc.php';

      $customerID = $_POST['user_id'];
      echo $customerID;

      $sql = "DELETE FROM customer WHERE customer_id='$customerID'";
      $result = mysqli_query($conn, $sql);

      if($result) {
         header("Location: ../owner.php?delete=success");
         exit();
      } else {
          header("Location: ../owner.php?delete=unsuccess");
         exit();
      }
   }
?>