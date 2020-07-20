<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/customer_orders.css">
      <link rel="stylesheet" href="./css/edit_customer_profile.css">
      <title>Edit Profile</title>
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
                  <li><a href="./log_out.php">Log out</a></li>
               </ul>
               <img src="./icons/menu-black.svg" alt="menu" id="menu">
               <img src="./icons/close.svg" alt="close" id="close">
            </nav>
         </header>
      </div>
      <main>
         <div class="content-container">
            <div class="profile-container">
               <div class="profile-content">
                  <h2 class="hello">Hello,</h2>
                  <h3>Username</h3>
                  <div class="buttons">
                     <div class="btn-container btn1">
                        <img src="./icons/fruit-basket.svg" alt="basket">
                        <a href="#">Start Shopping</a>
                     </div>
                     <div class="btn-container btn2">
                        <img src="./icons/edit.svg" alt="edit">
                        <a href="./customer_orders.php">Your Orders</a>
                     </div>
                     <div class="btn-container btn3">
                        <img src="./icons/review.svg" alt="review">
                        <a href="#">Add Review</a>
                     </div>
                     <div class="btn-container btn4">
                        <img src="./icons/delete.svg" alt="delete">
                        <a href="#">Delete Account</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="order-container">
               <div class="edit-form-container">
                  <h2>Edit Profile</h2>
                  <form action="">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="name" required autocomplete="off">
                     <label for="email">E-mail</label>
                     <input type="email" name="email" id="email" required autocomplete="off">
                     <label for="username">Username</label>
                     <input type="text" name="username" id="username" required autocomplete="off">
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" required autocomplete="off">
                     <label for="mobile">Mobile Number</label>
                     <input type="text" name="mobile" id="mobile" required autocomplete="off" maxlength="10">
                     <label for="address">Home Address</label>
                     <input type="text" name="address" id="address" required autocomplete="off">
                     <button type="submit" name="submit">Save Changes</button>
                  </form>
               </div>
            </div>
         </div>
      </main>
      <script src="./js/menu.js"></script>
   </body>

</html>