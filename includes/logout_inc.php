<?php
   if(isset($_POST['submit'])) {
      session_start();
      session_unset();
      session_destroy();

      header("Location: ../index.html?logout=success");
      exit();
   } else {
      header("Location: ../customer_profile.php?logout=unsuccess");
      exit();
   }
?>