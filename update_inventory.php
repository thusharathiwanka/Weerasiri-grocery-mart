<?php
   session_start();
      include_once './includes/db_conn_inc.php';
      $itemID = $_GET['Update_item'];
      $query = "SELECT * FROM item where id ='$itemID'";
      $result = mysqli_query($conn,$query);

      while($row=mysqli_fetch_assoc($result)){
         $Item_Id = $row['id'];
         $item_name = $row['item_name'];
         $item_unit_price = $row['item_unit_price'];
         $item_description = $row['item_description'];
         $item_quentity = $row['item_quentity'];
      }
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
               <link rel="stylesheet" href="./css/owner.css">
               <link rel="stylesheet" href="./css/inventory_manager.css">

               <title>WGM | Inventory Manager</title>
            </head>
            <body>
               <div class="header-container">
                  <header>
                     <nav>
                        <div class="name">
                           <h2>Weerasiri <span>Grocery Mart</span></h2>
                        </div>
                        <ul class="nav-links">
                           <li><a></a></li>
                           <li><a href="./inventory_manager.php">Profile</a></li>
                           <li><form action="./includes/admin_logout_inc.php" method="POST" id="logout-form">
                           <button type="submit" name="submit" id="logout" onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                           </form></li>
                        </ul>
                     </nav>
                  </header>
               </div>

               <main>
                  <div class="content-container">
                     <div class="profile-container">
                        <div class="profile-content">
                           <h2 class="hello">Admin Panel</h2>
                           <h3>Inventory Manager</h3>
                           <div class="buttons">
                              <div class="btn-container btn1">
                                 <a href="./inventory_manager.php">Inventory</a>
                              </div>
                              <div class="btn-container btn2">
                                 <a href="./update_items.php">Add Items</a>
                              </div>
                              <div class="btn-container btn3">
                                 <a href="./genarate_ex_inventory.php">Genarate EX</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="order-container">
                        <div class="form-container">
                           <form method="POST" class="search-form">
                              <p>Enter name to search items</p>
                              <input type="text" name="search" id="search">
                              <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                                    id="search"></button>
                           </form>
                        </div>

                     <div class="order-container">
                        <div class="edit-form-container">
                           <h2>Edit Inventory</h2><br>
                           <form class="edit-form" action="./includes/inventory_manager_inc.php" method="POST">
                              <label for="Item Id" id="Item Id">Item Id</label><br>
                              <input type="text" name="ItemId" id="ItemId" 
                              value="<?php echo $Item_Id;?>"><br><br>
                              <label for="Item Name">Item Name	</label><br>
                              <input type="text" name="ItemName" id="ItemName"
                              value="<?php echo $item_name;?>"><br><br>
                              <label for="Description">Description</label><br>
                              <input type="text" name="Description" id="Description"
                              value="<?php echo $item_description;?>"><br><br>
                              <label for="price">price</label><br>
                              <input type="number" name="price" id="price"
                              value="<?php echo $item_unit_price;?>"><br><br>
                              <label for="Quentity">Quentity</label><br>
                              <input type="number" name="Quentity" id="Quentity"
                              value="<?php echo  $item_quentity;?>"><br><br>
                              <button type="submit" name="submit" id="submit" >Save Changes</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  
               </main>
                     </body>


    
               <script src="./js/menu.js"></script>
               <script src="./js/headsup.js"></script>
            </body>

         </html>