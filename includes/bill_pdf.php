<?php 
session_start();
require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
date_default_timezone_set("Asia/Colombo");

$customerData .= '<div style="text-align: center;">';
$customerData .= '<h1>Weerasiri Grocery Mart</h1>';
$customerData .= '<p>A1, Yakkala</p><hr>';
$customerData .= '</div>';

$customerData .='<div class="order-container">';
$customerData .='<div class="container">';

				$query = "SELECT * FROM item ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				$count=0;
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{

					}
                }
$customerData .='Bill No: .I115764';     
$customerData .='<div style="clear:both"></div>';
$customerData .='<br />';
$customerData .='<h3>Items</h3>';
$customerData .='<div class="table-responsive">';
$customerData .='<table class="table table-bordered">';
$customerData .='<tr>';
$customerData .='<th width="40%">Item Name</th>';
$customerData .='<th width="10%">Quantity</th>';
$customerData .='<th width="20%">Price</th>';
$customerData .='</tr>';
 
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
$customerData .='<tr>';
$customerData .='<td>'.$values["item_name"].'</td>';
$customerData .='<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$values["item_quantity"].'</td>';
$customerData .='<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.'.$values["item_price"].'.00</td>';
$customerData .='<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs.'.number_format($values["item_quantity"] * $values["item_price"], 2).'</td>';
$customerData .='</tr>';

							$total = $total + ($values["item_quantity"] * $values["item_price"]);
							$count = $count + ($values["item_quantity"]);
						}

$customerData .='<tr>';
$customerData .='<td></td>';
$customerData .='</tr>';

					}

$customerData .='</table>';
$customerData .='<hr>';
$customerData .='<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sub Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs.'.$total.'.00</p>';

$customerData .='<hr>';
$customerData .='<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Net Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rs.'.$total.'.00</p>';
$customerData .='</div>';

$customerData .= '<br><br>';
$customerData .= '<p>Generated on - '.date("Y-m-d   h:i:a").'</p>';
$customerData .= '<br>';

$customerData .= '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Thank you for shopping with us</p>';

$customerData .= '<br><br>';
$customerData .= '<p>*IN VIEW OF FRQUENT PRICE CHANGES BY THE SUPPLIERS,
ANY DISCREPANCY, PLEASE NOTIFY WITHIN 07 DAYS FOR REFUND.</p>';

$customerData .= '*Complains - Clu. Manager - 0712364578';




    $mpdf->WriteHTML($customerData);
    $mpdf->Output('My Order Details.pdf', 'D');
?>
