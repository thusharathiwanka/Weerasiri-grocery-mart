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
      <link rel="stylesheet" href="./css/sign_up.css">
      <title>Sign Up</title>
   </head>

   <body>
      <header>
         <nav>
            <div class="name">
               <a href="./">
                  <h2>Weerasiri <span>Grocery Mart</span></h2>
               </a>
            </div>
            <ul class="nav-links">
               <li><a href="./#about">About</a></li>
               <li><a href="./#services">Services</a></li>
               <li><a href="./#contact">Contact</a></li>
            </ul>
            <img src="./icons/menu.svg" alt="menu" id="menu">
            <img src="./icons/close.svg" alt="close" id="close">
         </nav>
      </header>
      <main>
         <h1>Sign Up</h1>
         <form action="./includes/sign_up_inc.php" method="POST">
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
            <label for="address">City</label>
            <input type="text" name="city" id="city" required autocomplete="off">
            <button type="submit" name="submit">Sign Up</button>
         </form>
         <img src="./images/cup-cake.png" alt="cup-cake" id="cup-cake">
         <img src="./images/doughnut.png" alt="cup-cake" id="doughnut">
      </main>
      <footer>
         <h3>Tel - 011 222 2222, 011 333 3333</h3>
         <ul class="social-links">
            <li><a href="#"><img src="./icons/facebook.svg" alt="facebook"></a></li>
            <li><a href="#"><img src="./icons/instagram.svg" alt="facebook"></a></li>
            <li><a href="#"><img src="./icons/twitter.svg" alt="facebook"></a></li>
         </ul>
      </footer>
      <script src="./js/menu.js"></script>
   </body>

</html>