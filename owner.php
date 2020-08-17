<?php
   session_start();

   if(isset($_SESSION['admin_id'])) {
      include_once './includes/db_conn_inc.php';
      
      //Search
      if(isset($_POST['submit'])) {
         $searchKey = $_POST['search'];
         $sql = "SELECT * FROM customer WHERE customer_name LIKE '%$searchKey%'";
      } else { 
         //All customers
         $sql = "SELECT * FROM customer";
      }
      $customers = mysqli_query($conn, $sql);
      $checkResult = mysqli_num_rows($customers);

      echo '<!DOCTYPE html>
            <html lang="en">
            <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
               <link rel="icon" href="./icons/watermelon.svg">
               <link rel="stylesheet" href="./css/main.css">
               <link rel="stylesheet" href="./css/customer.css">
               <link rel="stylesheet" href="./css/owner.css">
               <title>Admin - Owner</title>
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
                           <li><a href="./owner.php">Profile</a></li>
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
                           <h2 class="hello">Hello,</h2>
                           <h3>'.$_SESSION['admin_name'].'</h3>
                           <div class="buttons">
                              <div class="btn-container btn1">
                                 <a href="./owner.php">View Customers</a>
                              </div>
                              <div class="btn-container btn2">
                                 <a href="./customer_orders.php">Manage Vehicles</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="order-container">
                        <div class="form-container">
                           <form action="" method="POST">
                              <p>Enter name to search customers</p>
                              <input type="text" name="search" id="search">
                              <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                                    id="search"></button>
                           </form>
                        </div>
                        <h3 id="orders">All Registered Customers</h3>
                        <div class="orders-titles">
                           <h3>Customer ID</h3>
                           <h3>Customer Name</h3>
                           <h3>Customer Username</h3>
                           <h3>Customer Mobile</h3>
                           <h3>Action</h3>
                        </div>';
                           if($checkResult > 0) {
                              while($row = mysqli_fetch_array($customers)) {
                                 echo "<hr>";
                                 echo '<div class="orders-titles customers">';
                                 echo "<p>".$row['customer_id']."</p>";
                                 echo "<p>".$row['customer_name']."</p>";
                                 echo "<p>".$row['customer_username']."</p>";
                                 echo "<p>".$row['customer_mobile']."</p>";
                                 echo '<form action="delete_customer_inc.php" method="POST" class="delete-form"><button class="cust-delete-btn">Delete</button></form>';
                                 echo '</div>';
                              }
                           } else {
                              echo "<p style='text-align: center;'>There are no matches for '".$searchKey."'</p>";
                           }
                  echo '</div>
                  </div>
               </main>
            </body>
         </html>';
   } else {
      header("Location: ./404.html");
      exit();
   }
?>