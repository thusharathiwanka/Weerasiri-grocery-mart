<?php
   session_start();

   if(isset($_SESSION['owner_id'])) {
      include_once './includes/db_conn_inc.php';

      $adminName = "";
      $adminEmail = "";
      $adminUsername ="";
      $adminPassword = "";
      $adminMobile = "";
      $adminSalary = "";
      $adminBankAcc = "";
      $adminBank = "";
      
      echo '<!DOCTYPE html>
            <html lang="en">
               <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
                  <link rel="icon" href="./icons/watermelon.svg">
                  <link rel="stylesheet" href="./css/main.css">
                  <link rel="stylesheet" href="./css/customer.css">
                  <link rel="stylesheet" href="./css/edit_customer_profile.css">
                  <link rel="stylesheet" href="./css/owner.css">
                  <link rel="stylesheet" href="./css/admin_edit.css">
                  <title>Admin - Edit Profile</title>

                  <style>
                     .right table td {
                        text-align: left;
                     }
                     .right table td {
                       padding: .6rem;
                     }
                  </style>
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
                           <img src="./icons/menu-black.svg" alt="menu" id="menu">
                           <img src="./icons/close.svg" alt="close" id="close">
                        </nav>
                     </header>
                  </div>';
                  if(isset($_GET['edit'])) {
                     $checkEdit = $_GET['edit'];
                     
                     if($checkEdit == "empty") {
                        echo "<div class='status-field'><p class='error edit-success'>Fields cannot be empty</p></div>";
                     } else if($checkEdit == "name_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Enter a valid name</p></div>";
                     } else if($checkEdit == "email_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Enter a valid email</p></div>";
                     } else if($checkEdit == "user_exists") {
                        echo "<div class='status-field'><p class='error edit-success'>This username is already taken</p></div>";
                     } else if($checkEdit == "mobile_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Enter a valid mobile number</p></div>";
                     } else if($checkEdit == "owner_password_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Your current password is invalid</p></div>";
                     } else if($checkEdit == "unsuccess") {
                        echo "<div class='status-field'><p class='error edit-success'>Something went wrong</p></div>";
                     } else if($checkEdit == "salary_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Enter a valid salary</p></div>";
                     } else if($checkEdit == "success") {
                        echo "<div class='status-field'><p class='success edit-success'>Details has been updated successfully</p></div>";
                     }
                  }
                  echo'<main>
                     <div class="content-container">
                        <div class="profile-container">
                           <div class="profile-content">
                              <h2 class="hello">Admin Panel</h2>
                           <h3>Owner</h3>
                           <div class="buttons">
                              <div class="btn-container btn1">
                                 <a href="./owner.php">Manage Customers</a>
                              </div>
                              <div class="btn-container btn2">
                                 <a href="./customer_orders.php">Manage Vehicles</a>
                              </div>
                              <div class="btn-container btn3">
                                 <a href="./customer_feedback.php">Manage Feedbacks</a>
                              </div>
                              <div class="btn-container btn4">
                                 <a href="./admin_edit.php">Edit Admins</a>
                              </div>
                              <div class="btn-container btn5">
                                 <a href="./customer_feedback.php">Income Report</a>
                              </div>
                              </div>
                           </div>
                        </div>
                        <div class="order-container">
                           <div class="check-form-container">
                              <form class="check-form" action="" method="POST">
                                 <div class="select">
                                    <select name="type" id="type" class="filter-type">
                                       <option value="" disabled selected="selected">Select Admin</option>
                                       <option value="Owner">Owner</option>
                                       <option value="HR_manager">HR Manager</option>
                                       <option value="Delivery_manager">Delivery Manager</option>
                                       <option value="Inventory_manager">Inventory Manager</option>
                                       <option value="Supplier_manager">Supplier Manager</option>
                                    </select>
                                 </div>
                                 <button type="submit" name="submit-check" id="admin-edit-btn" class="check-btn">Search</button>
                              </form>
                           </div>';
                           if(isset($_POST['submit-check'])) {
                              if(!empty($_POST['type'])) {
                                 $adminType = $_POST['type'];
                                 
                                 $sql = "SELECT * FROM admin WHERE admin_type='$adminType'";
                                 $result = mysqli_query($conn, $sql);
                                 $checkResult = mysqli_num_rows($result);

                                 if($checkResult > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                       $adminName = $row['admin_name'];
                                       $adminEmail = $row['admin_email'];
                                       $adminUsername = $row['admin_username'];
                                       $adminPassword = $row['admin_password'];
                                       $adminMobile = $row['admin_mobileno'];
                                       $adminSalary = $row['admin_salary'];
                                       $adminBankAcc = $row['admin_bank_acc_no'];
                                       $adminBank = $row['admin_bank'];
                                    }
                                 }
                              }
                           }
                           echo '<div class="edit-form-container">
                              <form class="edit-form" action="./includes/edit_admin_inc.php" method="POST">
                                 <div class="right">
                                    <table>
                                       <tr><td> <label for="name" id="edit-name">Name</label></td>
                                       <td><input type="text" name="name" id="name" required autocomplete="off"
                                          value="'.$adminName.'"></td></tr>
                                       <tr><td><label for="email">E-mail</label></td>
                                       <td><input type="email" name="email" id="email" required autocomplete="off"
                                          value="'.$adminEmail.'"></td></tr>
                                       <tr><td><label for="username">Username</label></td>
                                       <td><input type="text" name="username" id="username" required autocomplete="off"
                                          value="'.$adminUsername.'"></td></tr>
                                       <tr><td><label for="password">Password</label></td>
                                       <td><input type="password" name="new_password" id="new_password" required autocomplete="off" value="'.$adminPassword.'"></td></tr>
                                       <tr><td><label for="mobile">Mobile Number</label></td>
                                       <td><input type="text" name="mobile" id="mobile" required autocomplete="off" maxlength="10"
                                          value="'.$adminMobile.'"></td></tr>
                                       <tr><td><label for="salary">Salary</label></td>
                                       <td><input type="text" name="salary" id="salary" required autocomplete="off" maxlength="10"
                                          value="'.$adminSalary.'"></td></tr>
                                       <tr><td><label for="address">Bank Account Number</label></td>
                                       <td><input type="text" name="acc_no" id="address" required autocomplete="off"
                                          value="'.$adminBankAcc.'"></td></tr>
                                       <tr><td><label for="bank">Bank</label></td>
                                       <td><input type="text" name="bank" id="bank" required autocomplete="off"
                                          value="'.$adminBank.'"></td></tr>
                                       <tr><td><label for="password">Owner Password</label></td>
                                       <td><input type="password" name="current_password" id="current_password" required autocomplete="off" placeholder="Enter owner password to save chanages">
                                    </table>
                                  </div>
                                 <button type="submit" name="submit" id="admin-edit-btn" class="admin-edit-btn">Save Changes</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </main>
                  
               <script src="./js/menu.js"></script>
               <script src="./js/headsup.js"></script>
               <script src="./js/url.js"></script>
            </body>
         </html>';
   } else {
      //Redirecting to the error page
      header("Location: ./404.html");
      exit();
   }
?>