<?php

      include_once './includes/db_conn_inc.php';


    $sql = "SELECT * FROM item";
    $item = mysqli_query($conn, $sql);
    $checkResult = mysqli_num_rows($item);

    $output ='
    <table  >  
               <tr >  
                    <th>Item Id</th>  
                    <th>Item Name</th>  
                    <th>Description</th>  
                    <th>price</th>
                    <th>Quentity</th>
                    <th>tot price </th>
               </tr>
   ';
   while($row = mysqli_fetch_array($item))
   {
    $output .= '
     <tr>  
                    <td>'.$row["id"].'</td>  
                    <td>'.$row["item_name"].'</td>  
                    <td>'.$row["item_description"].'</td>  
                    <td>'.$row["item_unit_price"].'</td>  
                    <td>'.$row["item_quentity"].'</td>
                    <td>'.$row["item_quentity"] * $row["item_unit_price"].'</td>
     </tr>
    ';
   }
   $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Expenses_report_for_inventory.xls');
        echo $output;
       
?>
     </table>
      