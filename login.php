<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/login.css">
      <script src="https://unpkg.com/scrollreveal"></script>
      <title>Login</title>
   </head>

   <body>
      <header>
         <nav class="animation-top-delay">
            <div class="name">
               <a href="./">
                  <h2>Weerasiri <span>Grocery Mart</span></h2>
               </a>
            </div>
            <ul class="nav-links">
               <li><a href="./index.php">Home</a></li>
               <li><a href="./#about">About</a></li>
               <li><a href="./#services">Services</a></li>
               <li><a href="./#contact">Contact</a></li>
            </ul>
            <img src="./icons/menu.svg" alt="menu" id="menu">
            <img src="./icons/close.svg" alt="close" id="close">
         </nav>
      </header>
      <div class="status-field">
         <?php
            //Checking if signup is there in url
            if(isset($_GET['signup'])) {
               $checkSignup = $_GET['signup'];

               if($checkSignup == "success") {
                  echo "<p class='success'>Your account has been created successfully</p>";
               }
            }

            //Checking if login is there in url
            if(isset($_GET['login'])) {
               $checkLogin = $_GET['login'];

               if($checkLogin == "invalid") {
                  echo "<p class='error'>Your username or password is invalid</p>";
               }
            }

            //Checking if forget is there in url
            if(isset($_GET['forget'])) {
               $checkSend = $_GET['forget'];

            //Checking for email is send or not
            if($checkSend == "email_send") {
               echo "<p class='success'>Your password has been changed. Please check your emails</p>";
            }
         }
         ?>
      </div>
      <main>
         <div class="form-container animation-left">
            <h1>Login</h1>
            <form action="./includes/login_inc.php" method="POST">
               <?php
               //Checking if username is there in url
               if(isset($_GET['username'])) {
                  $username = $_GET['username'];
                  //Filling text field with entered url
                  echo '<label for="username">Username</label>
                        <input type="text" name="username" id="username" required autocomplete="off" value="'.$username.'">';
               } else {
                  echo '<label for="username">Username</label>
                        <input type="text" name="username" id="username" required autocomplete="off">';
               }
               ?>
               <label for="password">Password</label>
               <input type="password" name="password" id="password" required autocomplete="off">
               <p class="sign-up">Don't have an account ? <a href="./sign_up.php"> Sign Up</a></p>
               <p class="sign-up forget">Forget your password ? <a href="./forget_password.php">Reset Now</a></p>
               <button type="submit" name="submit">Login</button>
            </form>
         </div>
         <div class="img-container animation-right">
            <img src="./images/food-table.png" alt="food" class="food">
         </div>
      </main>
      <script src="./js/menu.js"></script>
      <script src="./js/headsup.js"></script>
      <script src="./js/url.js"></script>
      <script src="./js/animation.js"></script>
   </body>

</html>