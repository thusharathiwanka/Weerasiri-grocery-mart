<!DOCTYPE html>
<html lang="en" dir="ltr">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="./css/bootstrap.css">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/owner.css">
      <link rel="stylesheet" href="./css/customer.css">
      <link rel="stylesheet" href="./css/side.css">
      <title> Admin - HR Manager </title>

   </head>

   <body>
      <!--Header-->
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
                  <li>
                     <form action="./includes/logout_inc.php" method="POST" id="logout-form">
                        <button type="submit" name="submit" class="logout-btn" id="logout"
                           onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                     </form>
                  </li>
               </ul>
               <img src="./icons/menu-black.svg" alt="menu" id="menu">
               <img src="./icons/close.svg" alt="close" id="close">
            </nav>
         </header>
      </div>
      <!--Side Bar-->
      <div class="content-container">
         <div class="profile-container">
            <div class="profile-content">
               <h2 class="hello">Admin Panel</h2>
               <h3>HR Manager</h3><br>
               <div class="buttons">
                  <div class="btn-container btn1">
                     <a href="./employeelist.php">Employee List</a>
                  </div>
                  <div class="btn-container btn2">
                     <a href="./addEmployee.php">Add Employee</a>
                  </div>
                  <div class="btn-container btn3">
                     <a href="./salary.php">Add Salary Details</a>
                  </div>
                  <div class="btn-container btn5">
                     <a href="./salary_table.php">Salary Table</a>
                  </div>
                  <div class="btn-container btn5">
                     <a href="./driver.php">Add Delivery Amount</a>
                  </div>
                  <div class="btn-container btn5">
                     <a href="./helper.php">Add Attendance</a>
                  </div>
               </div>
            </div>
         </div>

         <!--Content-->
         <div class="order-container">
            <!--<div class="card">-->

            <?php require_once './includes/process_inc.php'; ?>

            <?php
      if(isset($_GET['add2'])) {
         $checkSignup = $_GET['add2'];

         //Checking for user deleting errors
         if($checkSignup == "success") {
            echo "<div class='status-field'><p class='success'>Details saved successfully.</p></div>";
         } else if($checkSignup == "unsuccess") {
            echo "<div class='status-field'><p class='error'>Not saved.</p></div>";
         }elseif($checkSignup == "updated"){
           echo "<div class='status-field'><p class='success'>Updated Successfully.</p></div>";
         }elseif($checkSignup == "unupdated"){
           echo "<div class='status-field'><p class='error'>Not saved.</p></div>";
         }
      }
       ?>

            <h4 class="card-header text-center">
               <strong>Add Attendance</strong>
            </h4><br>

            <div class="class-body container mt-5">
               <form class="offset-md-3 col-md-6" action="./includes/process_Inc.php" method="post">
                  <div class="md-form md-2">
                     <label for="">Helper ID</label>
                     <input type="text" name="did" class="form-control border border-secondary"
                        placeholder="Enter Helper ID" value="<?php echo $helper_id;?>">
                  </div><br>
                  <div class="mb-2">
                     <label for="">Attendance</label>
                     <input type="number" class="form-control border border-secondary" name="num" min="0"
                        value="<?php echo $attendance;?>" placeholder="0">
                  </div><br>
                  <div class="form-row">

                     <?php
              if ($update2 == true){
             ?>
                     <div class="col">
                        <div class="md-form">
                           <button type="submit" class="btn btn-outline-success form-control border border-success"
                              name="update3">Update The Record</button>
                        </div>
                     </div>
                     <?php }else{ ?>
                     <div class="col">
                        <div class="md-form">
                           <button type="submit" class="btn btn-outline-success form-control border border-success"
                              name="add2">Save The Record</button>
                        </div>
                     </div>
                     <?php } ?>

                     <div class="col">
                        <div class="md-form">
                           <a href="./helperTable.php" class="btn btn-outline-info form-control border border-info"
                              value="">Helper Table</a>
                        </div>
                     </div>

                  </div>

               </form><br><br>
            </div>
            <!--</div>-->
         </div>
         <script type="text/javascript" src="./js/headsup.js">

         </script>
   </body>

</html>