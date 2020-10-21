<?php
   session_start();

 
include_once './includes/db_conn_inc.php';
$query = "SELECT vehicle_id,SUM(cost)'cost'  FROM expense GROUP BY vehicle_id";
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{vehicle_id:'".$row["vehicle_id"]."', cost:".$row["cost"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Graphs</title>

  <style>
.btn1 {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
   position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* Darker background on mouse-over */
.btn1:hover {
  background-color: RoyalBlue;
}
</style>
  
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link rel="icon" href="./icons/watermelon.svg">
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 class="text-center">Statistical analysis for Vehicle Expenses</h2>
      
   <br /><br /><br/>
   <div id="chart"></div>
  </div>

  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "Expenses_report.php" style = "text-decoration: none; color: #333;">Back to Expenses</a></button>
</div>

<form method="post" action="export.php">
     <input class="btn1" type="submit" name="export"  value="Download Spreadsheet" />
    </form>

 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'vehicle_id',
 ykeys:['cost'],
 labels:['Total', 'cost'],
 hideHover:'auto',
 stacked:true,
 gridTextSize:18
});
</script>
