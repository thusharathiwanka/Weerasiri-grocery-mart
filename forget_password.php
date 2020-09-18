<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description"
         content="Weerasiri Grocery Mart is a private property located in Yakkala town, Gampaha district. Their aim is to offer its products at highly affordable prices to meet the demands of the middle-income local market area residents. The business has been building a strong market position with its 70 years of excellence in the town. They expect to catch the interest of a regular loyal customer base with its broad variety of breads, sweets, Beverages and all kind of quality bakery products. The bakery always provides freshly prepared bakery and pastry products. during business operations and the area is dedicated to self-service. In the grocery mart section, they offer goods ranging from grocery products, dairy products, beverages, frozen food, stationery and household.">
      <meta name="robots" content="index, follow">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/forget_password.css">
      <title>Forget Password</title>
   </head>

   <body>
      <div class='status-field home-status'>
         <?php
            //Checking if forget is there in url
            if(isset($_GET['forget'])) {
               $checkSend = $_GET['forget'];

               //Checking for password changing and email send errors
               if($checkSend == "email_not_send" || $checkSend == "password_not_changed") {
                  echo "<p class='error'>Sorry. Something went wrong</p>";
               } else if($checkSend == "email_not_found") {
                  echo "<p class='error'>Your email is not registered with the system</p>";
               }
            }
         ?>
      </div>
      <div class="" id="landing">
         <header>
            <nav>
               <div class="name">
                  <a href="./">
                     <h2>Weerasiri <span>Grocery Mart</span></h2>
                  </a>
               </div>
               <ul class="nav-links">
                  <li><a href="./index.php">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#services">Services</a></li>
                  <li><a href="#contact">Contact</a></li>
               </ul>
               <img src="./icons/menu.svg" alt="menu" id="menu">
               <img src="./icons/close.svg" alt="close" id="close">
            </nav>
         </header>
         <main>
            <div class="content">
               <h3>Enter your email address to reset password</h2>
                  <form action="./includes/forget_password_inc.php" method="POST">
                     <input type="email" name="email" autocomplete="off"><br>
                     <button type="submit" name="submit">Submit</button>
                  </form>
                  <img src="./images/forget-pwd.png" alt="forget-pwd" class="forget-img">
            </div>
         </main>
         <script src="./js/menu.js"></script>
         <script src="./js/headsup.js"></script>
   </body>

</html>