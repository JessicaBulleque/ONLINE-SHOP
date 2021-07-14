<?php
    error_reporting(0);
    session_start();
    include "../connection.php";

    $userID = $_SESSION['userID'];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all-product.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../image/icons/favicon.png" type="image/x-icon" />
    
  
    <title> TEAM PAYAMAN | CLOTHING LINES </title>
</head>

<body>

<!-- HEADER -->
<header>
    <div class="primary-header">
        <a href="index.php"><img class="logo" src="../image/logo/Logo.svg" alt="Team Payaman Logo"> </a>

         <div class="search-bar">
              <input type="search" id="search" name="search">
              <button class="search-icon"> Search </button>
         </div>

         <nav class="secondary-nav">
              <a href="#" class="register-link">Register</a>
              <a href="#" class="login-link">Login</a>
         </nav>
    </div>
    <div class="sub-header">
        <ul>
            <li><a href="#" > Home </a> </li>
            <li><a href="#" class="page"> Products</a>  </li>
            <li><a href="#"> Blogs </a>  </li>

        </ul>
    </div>
</header>
 
<!-- HEADER - END -->

<section>
    <h2> Search: All Products </h2>
    <select name="sort-by" id="sort-by">
        <option value=""> Sort by </option>
        <option value="Brand"> Brands </option>
        <option value="Brand"> Brands </option>
    </select>
</section>


<footer>
   <div class="payment-footer">
            <h2> PAYMENT METHOD </h2>
            <img src="../image/icons/paypal.png" alt="PayPal">
   </div>
   <div class="footer-primary">
          <div class="footer-info">
              <h2> ABOUT US </h2>
              <ul>
                  <li> <a href="#"> About us</a> </li>
                  <li> <a href="#"> Privacy Policy </a> </li>
                  <li> <a href="#"> Terms and Agreement </a> </li>
              </ul>
          </div>
          <div class="footer-info">
            <h2> CUSTOMER SERVICE </h2>
              <ul>
                  <li> <a href="#"> Help Centre </a> </li>
                  <li> <a href="#"> Return and Refund </a> </li>
              </ul>
          </div>
          <div class="footer-info">
            <h2> CONTACT US </h2>
              <ul>
                  <li> 
                      <a href="#">
                        <img src="../image/icons/gmail.png" alt=""> tpclothingline@gmail.com 
                      </a> 
                  </li>
                  <li> 
                      <a href="#">
                        <img src="../image/icons/phone-call (1).png" alt=""> 0912-345-6789 
                      </a>   
                  </li>
                
              </ul>
          </div>
   </div>
</footer>




    <!--SCRIPT-->
    <script src="../js/main.js"></script>
</body>
</html>