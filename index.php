<?php
    error_reporting(0);
    session_start();
    include "connection.php";

    $userID = $_SESSION['userID'];

 
    // THIS IS A VARIABLE HANDLE FOR QUERY
    $qry = "select * from products order by PRODUCTID DESC FETCH FIRST 10 ROWS ONLY";

    // OCI_PARSE FOR CONNECTION DB AND QUERY 
    $result = oci_parse($connection, $qry);
    // OCI_EXECUTE WILL EXECUTE THE $result OR YOUR QUERY
    oci_execute($result); 


    $selectUser = oci_parse($connection, "SELECT * FROM CUSTOMERACC WHERE USERID = $userID");
    oci_execute($selectUser);

    $userSelectedRow = oci_fetch_assoc($selectUser);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./image/icons/favicon.png" type="image/x-icon" />
    
  
    <title> TEAM PAYAMAN | CLOTHING LINES </title>
</head>


    <?php if(!empty($userID)) {?>
      <style>
        #login-icon-click{
          display: none;
        }
        #user-profile{
          display: flex;
        }
      </style>
    <?php } else{ ?>
      <style>
        #login-icon-click{
          display: flex;
        }
        #user-profile{
          display: none;
        }
      </style>
    <?php } ?>



<body>

<!-- HEADER -->
<header>
    <div class="primary-header">
        <a href="index.php"><img class="logo" src="./image/logo/Logo.svg" alt="Team Payaman Logo"> </a>

         <div class="search-bar">
              <input type="search" id="search" name="search" placeholder="Search products here">
              <button class="search-icon"> Search </button>
         </div>

         <nav class="secondary-nav">
              <a href="#" class="register-link">Register</a>
              <a href="#" class="login-link">Login</a>
         </nav>
    </div>
    <div class="sub-header">
        <ul>
            <li><a href="#" class="page"> Home </a> </li>
            <li><a href="#"> Products</a>  </li>
            <li><a href="#"> Blogs </a>  </li>

        </ul>
    </div>
</header>
<!-- HEADER - END -->

<!--IMAGE SLIDER-->
<div class="slider">
      <div class="slides">
        
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
       


        <div class="slide first">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <a href="#"> Shop now </a>
            </div>
            <img src="./image/models/team-payaman.png" alt="">
        </div>

        <div class="slide second">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <a href="#"> Shop now </a>
            </div>
            <img src="./image/models/viyLine.jpg" alt="">
        </div>
        
        <div class="slide third">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <a href="#"> Shop now </a>
            </div>

            <img src="./image/models/viyLine.jpg" alt="">
        </div>

        <div class="slide fourth">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <a href="#"> Shop now </a>
            </div>

            <img src="./image/models/viyLine.jpg" alt="">
        </div>
        




          <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
          </div>
      </div>


      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
</div>





<!--PROMOTIONS HERE-->
<div class="products-promotion">
    <div class="title">
      <h2>Team Payaman Collections</h2>
      <span>
        Select from the premium product and save plenty money
      </span>
    </div>


    <div class="promotion-container">
      <div class="promotion-item">
        <img src="./image/models/top-model.png" alt="">
        <div class="overlay">
          <div class="text">
          <h2>T-SHIRT</h2>
          <a href="#">SHOP NOW</a>
          </div> 
        </div>
      </div>

      <div class="promotion-item">
        <img src="./image/models/beans.png" alt="">
        <div class="overlay">
          <div class="text">
          <h2>BEANIES</h2>
          <a href="#">SHOP NOW</a>
          </div> 
        </div>
      </div>

      <div class="promotion-item">
        <img src="./Products/purse.png" alt="">
        <div class="overlay">
          <div class="text">
          <h2>PURSE</h2>
          <a href="#">SHOP NOW</a>
          </div> 
        </div>
      </div> 
    </div>
</div>


  



<!--NEW PRODUCTS-->
<div class="new-product-container">
    <div class="title-container">
      <h2> New Products </h2>
      <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique, dolor?</p>
    </div>

    <div class="product-container">

        <ul>

          <?php while($rows = oci_fetch_assoc($result)){ ?>
            <li>
              <div class="product-box">
              
                  <div class="container image-holder">
                      <a href="./php/product-details.php?id=<?=$rows['PRODUCTID']?>"> <img src="./Products/<?=$rows['PICTURE']?>" alt="" srcset=""> </a>
                  </div>
                  <div class="container product-info-holder">
                      <h3> &#8369; <?=$rows['PRODUCTPRICE']?>.00 </h3>
                      <p> <?=$rows['PRODUCTNAME']?> </p>
                  </div>

                  <input type="checkbox" name="wish" id="icon-wish">
                  <div class="icon-cart-holder">
                    <img src="./image/icons/shopping-cart.png" alt="" id="icon-cart">
                  </div>
              </div> 
            </li>
          <?php } ?>
        </ul>
    </div>
</div>




<div class="shop-by-brand-container">
      <h1> SHOP BY BRANDS </h1>

      <div class="brands-container">
            <img src="./image/logo/wlkjn-logo.png" alt="Logo">
            <img src="./image/logo/viyLine-logo.jpg" alt="Logo">
            <img src="./image/logo/boss1-logo.png" alt="Logo">
            <img src="./image/logo/giyang-logo.png" alt="Logo">
            <img src="./image/logo/cong-logo.png" alt="Logo">
      </div>
</div>




<footer>
   <div class="payment-footer">
            <h2> PAYMENT METHOD </h2>
            <img src="./image/icons/paypal.png" alt="PayPal">
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
                        <img src="./image/icons/gmail.png" alt=""> tpclothingline@gmail.com 
                      </a> 
                  </li>
                  <li> 
                      <a href="#">
                        <img src="./image/icons/phone-call (1).png" alt=""> 0912-345-6789 
                      </a>   
                  </li>
                
              </ul>
          </div>
   </div>
</footer>




    <!--SCRIPT-->
    <script src="./js/main.js"></script>
</body>
</html>