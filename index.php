<?php

    $username = "SYSTEM";
    $password = "masterkey";
    
    // CHANGE THIS "//localhost/xe" BASED ON YOUR DATABASE SID
    $connection = oci_connect($username, $password, "//localhost/orcl");

    // IF THE CONNECTION HAS ERROR
    if (!$connection) {
      // IT WILL DISPLAY THE ERROR MESSAGE
    $e = oci_error();
    echo htmlentities($e["message"]);
    }

    // THIS IS A VARIABLE HANDLE FOR QUERY
    $qry = "select * from products";

    // OCI_PARSE FOR CONNECTION DB AND QUERY
    $result = oci_parse($connection, $qry);
    // OCI_EXECUTE WILL EXECUTE THE $result OR YOUR QUERY
    oci_execute($result);
      
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
<body>

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
                <li><a href="#" onclick="shopIsHover()" class="shop-icon" >Shop <img src="./icons/down-arrow.png" alt=""></a></li>
            </ul>

            <div class="cart">
                <a href="#"><img src="./icons/shopping-bag.png" alt=""></a>
            </div>

            <div class="account">
            <a href="#"><img src="./icons/user.png" alt="" onclick="loginClick()"></a>
            </div>

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
              <button> Shop now </button>
            </div>
            <img src="./models/team-payaman.png" alt="">
        </div>

        <div class="slide second">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <button> Shop now </button>
            </div>
            <img src="./models/viyLine.jpg" alt="">
        </div>
        
        <div class="slide third">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <button> Shop now </button>
            </div>

            <img src="./models/viyLine.jpg" alt="">
        </div>

        <div class="slide fourth">
            <div class="text-info">
              <h1> LOREM IPSUM </h1>
              <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, voluptate. </p>
              <button> Shop now </button>
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




<div class="modal-bg">
  <div class="sign-in-out-container">
    <div class="close" onclick="loginClose()">
      <p> +</p>
    </div>
    <div class="login-container">
        <h1>LOGIN</h1>
            <form action="index.php" method="POST">
            <input type="text" placeholder="username or phone number"> <br>
            <input type="password" placeholder="password">  <br>  
            <button id="Fpw" type = "button">FORGOT PASSWORD?</button> <br>
            <button type="submit" id="login"> LOGIN </button>
            <p>or login using</p>
            
            <div class="accounts">
                <button><img src="./icons/facebook (1).png" alt="">Facebook</button>
                <button><img src="./icons/google.png" alt="">Google</button>
            </div>
            <h3>Don't have an account?</h3>  
        </form>
        <button id="reg" onclick="isClick()"> Register Now </button>
    </div>

    <div class="register-container">
        <h1>REGISTER</h1>
        <form action="index.php" method="POST">
          <table border="0">
            <tr>
              <td> <input type="text" name="fname"  placeholder="FirstName"> </td>
            </tr>

            <tr>
              <td> <input type="text" name="lname"  placeholder="LastName"></td>
            </tr>

            <tr>
              <td><input type="text" name="address"  placeholder="Address"></td>
            </tr>

            <tr>
              <td><input type="text" name="contact"  placeholder="Contact Number"></td>
            </tr>

            <tr>
              <td> <input type="email" name="email"  placeholder="Email"> </td>
            </tr>

            <tr>
              <td> <input type="password" name="pass"  placeholder="Password"></td>
            </tr>

            <tr>
              <td><input type="submit" value="REGISTER"></td>
            </tr>
          </table>
        </form>

        <h3>Already have an account?</h3>  
        <button id="login" onclick="isClick1()"> Login Now!</button>

    </div>
  </div>
</div>



<!--PROMOTIONS HERE-->
<div class="products-promotion">
    <section class="section promotion">
    <div class="title">
      <h2>Team Payaman Collections</h2>
      <span>Select from the premium product and save plenty money</span>
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
  <div class="container title-container">
    <h1>NEW PRODUCTS</h1>
    <h3>Select from the premium product brands and save plenty money</h3>
  </div>

  <div class="container products-container">
    <ul>
       
    <?php 
    // IT WILL FETCH THE DATA FROM YOUR DATABASE $RESULT
    while($row = oci_fetch_array($result)) { 
    ?>

      <li>
        <a href="index.php?<?=$row['PRODUCTID']?>">
        <div class="new-product-box">

            <div class="product-image">
              <img src="./shirts/<?=$row['PICTURE']?>" alt="">

              <div class="icon-container">
                <img id="wish" src="./icons/heart.png" alt=""><br>
                <img src="./icons/shopping-cart.png" alt="">
              </div>

            </div>



          <div class="product-info">
            <p><?=$row['PRODUCTNAME']?></p>
            <h3><?=$row['PRODUCTPRICE']?></h3>
          </div>


        </div>
      </li>
      </a>
    <?php } ?>
      
    </ul>
   
    
</div>
</div>
















<!--EXCLUSIVE SALES-->
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
</body>
</html>