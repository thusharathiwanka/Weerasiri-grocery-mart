</<?php
    session_start();
    include_once 'db_conn_inc.php';

    if(isset($_POST['submit'])){

      $orderID = $_POST['supplierID'];
      $method = $_POST['pay'];

      $sql = "UPDATE customer_order SET payment_method='$method' WHERE order_id='$orderID'";
      $result = mysqli_query($conn, $sql);
      header("location:../order_list.php");

      // Close connection
      mysqli_close($conn);

   }else{
      header("location:../404.html");
   }

 ?>
