<?php
    error_reporting(0);
    session_start();
    include "connection.php";

    $userID = $_SESSION['userID'];


    // THIS IS A VARIABLE HANDLE FOR QUERY
    $qry = "select * from products order by PRODUCTID DESC";

    // OCI_PARSE FOR CONNECTION DB AND QUERY
    $result = oci_parse($connection, $qry);
    // OCI_EXECUTE WILL EXECUTE THE $result OR YOUR QUERY
    oci_execute($result);


    $selectUser = oci_parse($connection, "SELECT * FROM CUSTOMERACC WHERE USERID = $userID");
    oci_execute($selectUser);

    $userSelectedRow = oci_fetch_assoc($selectUser);



    if(isset($_GET['logout'])){
      session_unset();
      session_destroy();
      header("location:index.php");
    }
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./icons/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/style.css">
  
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
        <div class="logo">
            <a href="index.php"><img src="./logo/logo.png" alt=""></a>
        </div>

        <div class="nav-links">
          <div class="search">
            <a href="#"><img src="./icons/search.png" alt=""></a>
          </div>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#" class="shop-icon" > Shop <img src="./icons/down-arrow.png" alt=""></a></li>
            </ul>

            <div class="cart">
                <a href="#"> <img src="./icons/shopping-bag.png"> </a>
            </div>

            <div class="account">
              <a href="#"> <img src="./icons/user.png" id="login-icon-click"> </a>
              
              <?php if(!empty($userSelectedRow['PROFILEPIC'])){ ?>
              <a id="user-profile"> <img src="./user-profile/<?=$userSelectedRow['PROFILEPIC']?>" alt=""></a>
              <?php } else{ ?>
                <a id="user-profile"> <img src="./user-profile/default-profile.jpg" alt=""></a>
              <?php } ?>
            </div>
        </div>

        <div class="nav-account">
            <form action="index.php" method="GET">
              <ul>
                <li> 
                  <h4>
                    <?=$userSelectedRow['FIRSTNAME']?> 
                    <?=$userSelectedRow['LASTNAME']?>
                  </h4>
                </li>

                <li>
                  <a href="#"> My Account </a>
                </li>

                <li>
                  <a href="#"> My Purchase </a>
                </li>

                <li>
                  <button type="submit" name="logout"> Logout </button>   
                </li>
              </ul>
            </form>
        </div>
               


      <!--SHOP HOVER-->
        <div class="shop-hover">
             <div class="hover-image">
               <img src="./models/tp.jpg" alt="">
             </div>

             <div class="brands">
               <h1>Brands</h1>
               <ul>
                 <li><a href="#">Viy Line</a></li>
                 <li><a href="#">Giyang Clothing</a></li>
                 <li><a href="#">Boss Apparel</a></li>
                 <li><a href="#">WLKJN Clothing</a></li>
               </ul>
             </div>

             <div class="branch">
             <h1>Branch</h1>
               <ul>
               <li><a href="#">Quezon City</a></li>
                 <li><a href="#">Paranaque</a></li>
                 <li><a href="#">Laguna</a></li>
                 <li><a href="#">Cavite</a></li>
               </ul>
             </div>

             <div class="branch">
             <h1>Branch</h1>
               <ul>
               <li><a href="#">Quezon City</a></li>
                 <li><a href="#">Paranaque</a></li>
                 <li><a href="#">Laguna</a></li>
                 <li><a href="#">Cavite</a></li>
               </ul>
             </div>
        </div>
</header>


<!-- LOGIN MODAL -->
<div class="modal-bg">
    <div class="login-container">
        <div class="close">
           +
        </div>

        <div class="container login-box">
            <h1> Login here </h1>

           <form action="./processes/login-process.php" method="POST">
              <table border="0">
                <tr>
                  <td> 
                    <input type="text" name="email" placeholder="Email address"> 
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="password" name="pass"  placeholder="Password">
                  </td>
                </tr>
                <tr>
                  <td> <a href="#" class="fp"> Forgot password? </a> </td>
                </tr>
                <tr>
                  <td><button type="submit" name="login-btn" id="login-btn"> Login </button></td>
                </tr>
              </table>
              <div class="division">
                  <hr> <p> Or login using </p> <hr>
              </div>
           </form>
              <div class="other-acc">
                  <button id="fb-btn">
                      <img src="./icons/facebook (1).png" alt="">
                      <p>Facebook</p>
                  </button>
                  <button id="google-btn">
                      <img src="./icons/google.png" alt="">
                      <p> Google </p>
                  </button>
              </div>

              <div class="reg-now">
                  <p> Don't have an account? <span id="reg-click"> Register now. </span></p>
              </div>
        </div>

        <div class="container reg-box">
            <h1> Register here </h1>
            <form action="" method="POST">
                <table>
                  <tr>
                    <td><input type="text" placeholder="Firstname"></td>
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Lastname"></td>
                  </tr>
                  <tr>
                    <td><input type="text" placeholder="Address"></td>
                  </tr>
                  <tr>
                    <td><input type="email" placeholder="Email address"></td>
                  </tr>
                  <tr>
                    <td><input type="password" placeholder="Password"></td>
                  </tr>
                  <tr>
                    <td> <button type="submit" name="register-btn" id="register-btn"> Register </button></td>
                  </tr>
                </table>
            </form>

              <div class="log-now">
                  <p> Already have an account? <span id="log-click"> Sign in now. </span></p>
              </div>
        </div>
    </div>
</div>




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
            <img src="./models/team-payaman.png" alt="">
        </div>

        <div class="slide second">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <a href="#"> Shop now </a>
            </div>
            <img src="./models/viyLine.jpg" alt="">
        </div>
        
        <div class="slide third">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <a href="#"> Shop now </a>
            </div>

            <img src="./models/viyLine.jpg" alt="">
        </div>

        <div class="slide fourth">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <a href="#"> Shop now </a>
            </div>

            <img src="./models/viyLine.jpg" alt="">
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
        <img src="./models/top-model.png" alt="">
        <div class="overlay">
          <div class="text">
          <h2>T-SHIRT</h2>
          <a href="#">SHOP NOW</a>
          </div> 
        </div>
      </div>

      <div class="promotion-item">
        <img src="./models/beans.png" alt="">
        <div class="overlay">
          <div class="text">
          <h2>BEANIES</h2>
          <a href="#">SHOP NOW</a>
          </div> 
        </div>
      </div>

      <div class="promotion-item">
        <img src="./purse/purse.png" alt="">
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
                      <a href="./php/product-details.php?id=<?=$rows['PRODUCTID']?>"> <img src="./shirts/<?=$rows['PICTURE']?>" alt="" srcset=""> </a>
                  </div>
                  <div class="container product-info-holder">
                      <h3> &#8369; <?=$rows['PRODUCTPRICE']?>.00 </h3>
                      <p> <?=$rows['PRODUCTNAME']?> </p>
                  </div>

                  <input type="checkbox" name="wish" id="icon-wish">
                  <div class="icon-cart-holder">
                    <img src="./icons/shopping-cart.png" alt="" id="icon-cart">
                  </div>
              </div> 
            </li>
          <?php } ?>
        </ul>
    </div>
</div>















<!--EXCLUSIVE SALES
<div class="exclusive-sales-container">
  <ul>
    <li class="sample">
      <div class="banner-container" id="banner-container">
        <div class="info banner">
          <img src="./sauce/sauce.jpg" alt="">
        </div>

        <div class="info text">
          
          <div class="text-info">
            <h3>EXCLUSIVE SALES</h3>
            <h1>Payaman Sauce Collection</h1>
            <a href="#"><h3>View Collection</h3></a>
          </div>

        </div>

        <div class="overlay">
          
        </div>
      </div>


    </li>

    <li>

    </li>
  </ul>
</div>
-->









<!--FOOTER-->
<div class="footer">
      <div class="aboutUs">
        <h1>ABOUT US</h1>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Career</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="payment">
      <h1>PAYMENT</h1>
          <img src="./icons/gcash.png" alt="" class="gcash">
          <img src="./icons/paypal.png" alt="" class="paypal">
      </div>

      <div class="logistic">
      <h1>LOGISTICS</h1>
      <img src="./icons/JnT.png" alt="" class="JT">
          <img src="./icons/ninja.png" alt="" class="ninja">
      </div>


      <div class="customer">
        <h1>CUSTOMER SERVICE</h1>
        <ul>
          <li><a href="#">Help Centre</a></li>
          <li><a href="#">Order Tracking</a></li>
          <li><a href="#">Free Shipping</a></li>
          <li><a href="#">Return & Refund</a></li>
        </ul>
      </div>

      <div class="contact">
        <h1>CONTACT US</h1>
        <ul>
          <li><img src="./icons/gmail.png" alt="" class="gmail"></li>
          <p class="mail"><a href="#">tpclothingline@gmail.com</a></p>
        </ul>
      </div>

      <div class="number">
          <img src="./icons/phone-call (1).png" alt="" class="phone">
          <p><a href="#">0912-345-6789</a></p>
        </div>
</div>


    <!--SCRIPT-->
    <script src="./js/main.js"></script>
    <script src="./js/clickable.js"></script>
</body>
</html>