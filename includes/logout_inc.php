<?php
   if(isset($_POST['submit'])) {
      session_start();
      unset($_SESSION['customer_id']);

      header("Location: ../login.php?logout=success");
      exit();
   } else {
      header("Location: ../customer_profile.php?logout=unsuccess");
      exit();
   }
?>