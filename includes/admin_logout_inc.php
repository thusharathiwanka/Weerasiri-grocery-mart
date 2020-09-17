<?php
   if(isset($_POST['submit'])) {
      session_start();
      
      if($_SESSION['admin_type'] == "Owner") {
         unset($_SESSION['owner_id']);
      } else if ($_SESSION['admin_type'] == "HR_manager") {
         unset($_SESSION['hr_admin_id']);
      } else if ($_SESSION['admin_type'] == "Delivery_manager") {
         unset($_SESSION['delivery_admin_id']);
      } else if ($_SESSION['admin_type'] == "Inventory_manager") {
         unset($_SESSION['inventory_admin_id']);
      } else if ($_SESSION['admin_type'] == "Supplier_manager") {
         unset($_SESSION['supplier_admin_id']);
      } 

      header("Location: ../admin_login.php?logout=success");
      exit();
   }
?>