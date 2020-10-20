<?php
   if(isset($_GET['delete_item'])) {
      include_once 'db_conn_inc.php';

      $itemID = $_GET['delete_item'];

      //Delete query
      $sql = "DELETE FROM item WHERE id='$itemID'";
      $result = mysqli_query($conn, $sql);

      //Checking if deleted or not
      if(!$result) {
         header("Location: ../inventory_manager.php?delete=unsuccess");
         exit();
      } else {
         header("Location: ../inventory_manager.php?delete=success");
         exit();
      }
   }

   //update part
   if(isset($_POST['submit'])){

      include_once 'db_conn_inc.php';

      $itemID = $_POST['ItemId'];
      $ItemName = $_POST['ItemName'];
      $ItemDescription = $_POST['Description'];
      $price = $_POST['price'];
      $Quentity = $_POST['Quentity'];
      
      
      //Updating items to table
         $sql = "UPDATE item  SET item_name='$ItemName', item_description='$ItemDescription',item_unit_price='$price',item_quentity=' $Quentity' WHERE id='$itemID'";
         $result = mysqli_query($conn, $sql);

       //Checking if deleted or not
      if(!$result) {
         header("Location: ../inventory_manager.php?Update=unsuccess");
         exit();
      } else {
         header("Location: ../inventory_manager.php?Update=success");
         exit();
      }
   
   }
?>