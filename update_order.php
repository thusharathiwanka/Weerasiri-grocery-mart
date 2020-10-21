<?php
    session_start();
        include_once './includes/db_conn_inc.php';

?>
         <!DOCTYPE html>
            <html lang="en">


               <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
                  <link rel="icon" href="./icons/watermelon.svg">
                  <link rel="stylesheet" href="./css/main.css">
                  <link rel="stylesheet" href="./css/customer.css">
                  <link rel="stylesheet" href="./css/cart.css">
                  <link rel="stylesheet" href="./css/order_list.css">

                  <title>WGM | Update Order</title>
               </head>

               <body>
                  <div class="header-container">
                     <header>
                        <nav>
                           <div class="name">
                              <h2>Weerasiri <span>Grocery Mart</span></h2>
                           </div>
                           <ul class="nav-links">
                              <li><a href="./customer_profile.php">Profile</a></li>
                              <li><a href="./cart.php" class="cart">Cart <img src="./icons/cart.svg" alt="cart"
                                       class="cart-img"></a></li>
                              <li><form action="./includes/logout_inc.php" method="POST" id="logout-form">
                              <button type="submit" name="submit" class="logout-btn" id="logout" onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                              </form></li>
                              </ul>
                           <img src="./icons/menu-black.svg" alt="menu" id="menu">
                           <img src="./icons/close.svg" alt="close" id="close">
                        </nav>
                     </header>
                  </div>

                  <?php
                   if(isset($_GET['submit'])) {
                     $checkEdit = $_GET['submit'];

                     if($checkEdit == "success") {
                         echo "<div class='status-field'><p class='success edit-success'>Your account has been updated successfully</p></div>";
                        }
                     }
                     ?>

                  <main>
                     <div class="content-container">
                        <div class="profile-container">
                           <div class="profile-content">
                              <h2 class="hello">Hello,</h2>
                              <h3><?php echo $_SESSION['customer_name'];?></h3>
                              <div class="buttons">
                                 <div class="btn-container btn1">
                                    <img src="./icons/fruit-basket.svg" alt="basket">
                                    <a href="Store.php">Start Shopping</a>
                                 </div>
                                 <div class="btn-container btn2">
                                    <img src="./icons/review.svg" alt="review">
                                    <a href="order_list.php">Order List</a>
                                 </div>
                                 <div class="btn-container btn3">
                                    <img src="./icons/edit.svg" alt="edit">
                                    <a href="./includes/bill_pdf.php">Details Report</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="order-container">
                           <div class="edit-form-container profile-details">
                              <h2 class="profile-title"></h2><br>
                              <div class="header-container">
   


     <div class="right">
       <form class="rght" action="./includes/edit_order_inc.php" method="POST">

         <center><h3>Update Order Details</h3><br><br></center>
<?php
      $sql = "SELECT * FROM customer_order;";
       $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
      if($row = mysqli_fetch_assoc($result)){

         ?>

         <input type="hidden" name="supplierID" value="<?php echo $orderID=$_GET['order_id']; ?>">
         <div class="add_details-container_s_name">
            <label id="s_name_lbl" for="s_name_lbl">Order ID</label>
            <input readonly id="s_name" type="text" name="s_name" value="<?php echo $row['order_id']; ?>">
         </div>

         <div class="add_details-container_cmpny_name">
            <label id="cmpny_name_lbl" for="cmpny_name_lbl">Ordered Date</label>
            <input readonly id="cmpny_name" type="text" name="cmpny_name" placeholder="Company name" value="<?php echo $row['order_date']; ?>">
         </div>

         <div class="add_details-container_Item">
            <label id="item_lbl" for="item_lbl">Total Price</label>
            <input readonly id="item" type="text" name="item" placeholder="Product" value="Rs.<?php echo $row['total_price']; ?>.00" >
         </div>

         <!-- <div class="add_details-container_Contact">
            <label id="cntct_lbl" for="cntct_lbl">Payment Method</label><br>
            <input id="pay" type="tel" name="pay" placeholder="Payment Method" value="<?php echo $method = ''; ?>" required><br>
         </div> -->

         <div class="select">
                        <select name="pay" id="pay" class="add_details-container_Contact" required>
                           <option value="<?php echo $method = 'Cash'; ?>">Cash</option>
                           <option value="<?php echo $method = 'Card'; ?>">Card</option>
                        </select>
                     </div>

         <br><br>
         <button type="submit" name="submit" id="submit">Edit & Save Details</button>

       </form>
     </div>
<?php
   }
}
?>
                                 
                               
                                      
                           
                   </div>
<hr>
                    
            
   
                    </div>
                    

                    </div>
                    </div>
                    </div>
                  </main>
        
                  <script src="./js/cart.js"></script>
                  <script src="./js/menu.js"></script>
                  <script src="./js/headsup.js"></script>
                  

               </body>

            </html>