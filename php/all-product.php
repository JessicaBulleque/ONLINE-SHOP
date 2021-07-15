<?php
    error_reporting(0);
    session_start();
    include "../connection.php";

    $userID = $_SESSION['userID'];

    $select = oci_parse($connection, "SELECT * FROM PRODUCTS");
    oci_execute($select);

    
    // SELECT CUSTOMER
    $selectUser = oci_parse($connection, "SELECT * FROM CUSTOMERACC WHERE USERID = $userID");
    oci_execute($selectUser);

    $userSelectedRow = oci_fetch_assoc($selectUser);

    
    // CART COUNT
    $countItem = oci_parse($connection, "SELECT COUNT(*) AS TOTAL FROM CART_TBL WHERE CUSTOMERID = $userID");
    oci_execute($countItem);

    $itemCount = oci_fetch_assoc($countItem);

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
    <!-- AJAX LINK -->
    
    <title> TEAM PAYAMAN | CLOTHING LINES </title>
</head>

<!-- USER LOGIN CONDITION -->
    <?php if(!empty($userID)) {?>
      <style>
          .user-nav{
            display: flex;
          }
          .secondary-nav{
            display: none;
          }
      </style>
    <?php } else{ ?>
      <style>
          .user-nav{
            display: none;
          }
          .secondary-nav{
            display: flex;
          }
      </style>
    <?php } ?>

<body>

<!-- HEADER -->
<header>
    <div class="primary-header">
        <a href="../index.php"><img class="logo" src="../image/logo/Logo.svg" alt="Team Payaman Logo"> </a>

         <div class="search-bar">
              <input type="search" id="search" name="search" placeholder="Search products here">
              <button class="search-icon"> Search </button>
         </div>

         <nav class="secondary-nav">
              <a href="../E-commerce/register.php" class="register-link">Register</a>
              <a href="../E-commerce/login.php" class="login-link">Login</a>
         </nav>
         <nav class="user-nav">
              <a href="../php/cart.php" class="cart-icon">
                  <div class="count-cart">
                      <?=$itemCount['TOTAL']?>
                  </div>
                 <img src="../image/icons/shopping-cart.png" alt="">
              </a>
              <a href="#" class="user-profile"> <img src="../image/user-profile/<?=$userSelectedRow['PROFILEPIC']?>" alt=""></a>
         </nav>
    </div>
    <div class="sub-header">
        <ul>
            <li><a href="../index.php"> Home </a> </li>
            <li><a href="./php/all-product.php"  class="page"> Products</a>  </li>
            <li><a href="../E-commerce/blogs.php"> Blogs </a>  </li>

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

    <div class="product-container">
        <ul>
        <?php while($rows = oci_fetch_assoc($select)) {?>
            <li>
                <div class="product-box">
                    <div class="container image-holder">
                        <a href="../php/product-details.php?id=<?=$rows['PRODUCTID']?>"> <img src="../Products/<?=$rows['PICTURE']?>" alt="" srcset=""> </a>
                    </div>
                    <div class="container product-info-holder">
                        <h3> &#8369; <?=$rows['PRODUCTPRICE']?>.00 </h3>
                        <p> <?=$rows['PRODUCTNAME']?> </p>
                    </div>

                    <input type="checkbox" name="wish" id="icon-wish">
                    <div class="icon-cart-holder">
                        <img src="../image/icons/shopping-cart.png" alt="" id="icon-cart">
                    </div>
                </div> 
            </li>
        <?php } ?>
        </ul>
            
    </div>
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