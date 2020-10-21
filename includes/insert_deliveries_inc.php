 <?php

   include_once 'db_conn_inc.php';

   if(isset($_POST['insert'])) {

      if(!empty($_POST['order_id']) && !empty($_POST['price']) && !empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['Did']) &&
         !empty($_POST['id']) && !empty($_POST['status'])) {

            $order_id = $_POST['order_id'];
            $total_price = $_POST['price'];
            $customer_name = $_POST['name'];
            $customer_address = $_POST['address'];
            $driver_id = $_POST['Did'];
            $vehicle_id = $_POST['id'];
            $status = $_POST['status'];  
     
           // $order_id = $_SESSION['order_id'];


      //   echo $order_id;
      //   echo $driver_id;
      //  echo $customer_name;
      //  echo $customer_address;
      //  echo $vehicle_id;
      //  echo $status;

       $sql = "INSERT INTO delivery(order_id, customer_name, customer_address, total_price, driver_id, vehicle_id, delivery_status) 
               VALUES ($order_id, '$customer_name', '$customer_address', $total_price, $driver_id, $vehicle_id, '$status')";
       $result = mysqli_query($conn, $sql);
      

       if($result == false) {
              header("Location: ../all_deliveries.php?all_deliveries=unsuccess");
        }
        else {
             header("Location: ../all_deliveries.php?all_deliveries=success");
        }
      }

      else {
         echo "All fields required";
      }
   }
?>
