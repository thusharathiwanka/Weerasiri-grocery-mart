<?php 
    $conn = new mysqli("localhost", "root", "", "supermarketdb");
    if($conn->connect_error) { die("Connection Failed :". $conn->connect_error); }

    $output = '';

    $sql = "SELECT * FROM delivery";
    $stmt = $conn->query($sql);

    $sql2 = "SELECT sum(total_price) AS total FROM delivery";
    $stmt2 = $conn->query($sql2);
    $row1 = $stmt2->fetch_assoc();

?>


<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
               <link rel="icon" href="./icons/watermelon.svg">
            
    <meta http-equiv="X-UA-Compatible" connect="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale=1>
    <title>Income Report</title>
    <style>
        h2{
          font-style: italic;
          text-align: center;
          color: black;
        }
        table{
          border-collapse: collapse;
          width: 100%;
          font-size: 18px;
          font-style: italic;
          text-align: center;
        }
        th
        {
          background-color: #133d66e6;
          color: white;
         
        }
        th,td{
          border: 2px solid #ddd;
          padding: 8px 120px;
          
        }
    </style>
</head>
<body></br>
<h2>INCOME REPORT</h2></br>
<div class="container" style="width: 100%; height:auto;">
<div class="col-md-12">
  <table class="table table-condensed table-bordered table-striped table-hover ">
    <thead>
      <tr>
        <th>Delivery No</th>
        <th>Delivery Date</th>
        <th>Name</th>
        <th>Address</th>
        <th>Price (Rs.)</th>
      </tr>
    </thead>
    <tbody>
    <?php
        if($stmt->num_rows > 0)
        {
            while($row = $stmt->fetch_array())
            {
              $output.= '<tr>
                         <td width="10%">'.$row["delivery_id"].'</td>
                         <td width="25%">'.$row["delivery_date"].'</td>
                         <td width="25%">'.$row["customer_name"].'</td>
                         <td width="25%">'.$row["customer_address"].'</td>
                         <td width="35%">'.$row["total_price"].'</td>
                         </tr>';
            }

              $output .= '<tr class="text-center">
                          <td colspan="8"><b>Total Amount  (Rs.) = '.$row1["total"].'</b></td>
                          </tr>';
        }
        else{
          $output .= '<tr><td colspan="4" class="text-center"><h4>Data Not Found.</h4></td></tr>'; 
        }

        echo $output
    ?>
    </tbody>
  </table>
  </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap.min.js"></script>
  </body>
  </html>