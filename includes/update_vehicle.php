</<?php
    session_start();
    include_once 'db_conn_inc.php';

    if(isset($_POST['edit'])){

      
	$vehicleID = $_POST['vehicle_id'];
    $vehicle_color = $_POST['color'];
    $vehicle_mileage = $_POST['mileage'];
     

      $sql = "UPDATE vehicle SET vehicle_color='$vehicle_color', vehicle_mileage='$vehicle_mileage' WHERE vehicle_id='$vehicleID'";
      $result = mysqli_query($conn, $sql);
      header("location:../EditVehicle.php");

      // Close connection
      mysqli_close($conn);

   }else{
      header("location:../404.html");
   }

 ?>
