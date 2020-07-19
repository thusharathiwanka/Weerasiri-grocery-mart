<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/customer_orders.css">
      <title>Orders</title>
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
                        <a href="menu.php">Start Shopping</a>
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
               <div class="form-container">
                  <form action="">
                     <p>Enter date to search orders</p>
                     <input type="date" name="search" id="search" placeholder="Enter date">
                     <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                           id="search"></button>
                  </form>
               </div>
               <h3 id="orders">Your Orders</h3>
               <div class="orders-titles">
                  <p>Order ID</p>
                  <p>Date</p>
                  <p>Bill Amount</p>
                  <p>Status</p>
               </div>
            </div>
         </div>
      </main>
      <div class="footer-container">
         <footer>
            <h3>Tel - 011 222 2222, 011 333 3333</h3>
            <ul class="social-links">
               <li><a href="#"><img src="./icons/facebook-black.svg" alt="facebook"></a></li>
               <li><a href="#"><img src="./icons/instagram-black.svg" alt="facebook"></a></li>
               <li><a href="#"><img src="./icons/twitter-black.svg" alt="facebook"></a></li>
            </ul>
         </footer>
      </div>
      <script src="./js/menu.js"></script>
   </body>

</html>