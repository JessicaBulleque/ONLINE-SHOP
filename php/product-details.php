<?php

    session_start();
    include "../connection.php";

    $userID = $_SESSION['userID'];

    $productID = $_GET['id'];

    //FOR PRODUCTS//
    $query = oci_parse($connection, "select * from products where PRODUCTID = '$productID'");
    oci_execute($query);
    $result = oci_fetch_assoc($query);

    //FOR PRODUCT COLOR//
    $cquery = oci_parse($connection, "select * from PRODUCT_COLOR where PRODUCTID = '$productID'");
    oci_execute($cquery);

    //FOR PRODUCT SIZE//
    $squery = oci_parse($connection, "select * from PRODUCT_SIZE where PRODUCTID = '$productID'");
    oci_execute($squery);
    

    //USER-PROFILE//
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
    <title> <?=$result['PRODUCTNAME']?> | TEAM PAYAMAN </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../image/icons/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/product-detials.css">
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
            <a href="index.php"><img src="../image/logo/logo.png" alt=""></a>
        </div>

        <div class="nav-links">
          <div class="search">
              <input type="search" name="search" id="search">
              <img src="../image/icons/search.png" id="search-icon">
          </div>

            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#" class="shop-icon" > Shop <img src="../image/icons/down-arrow.png" alt=""></a></li>
            </ul>

            <div class="cart">
                <a href="#"> <img src="../image/icons/shopping-bag.png"> </a>
            </div>

            <div class="account">
              <a href="#"> <img src="../image/icons/user.png" id="login-icon-click"> </a>
        
              <a id="user-profile"> <img src="../image/user-profile/<?=$userSelectedRow['PROFILEPIC']?>" alt=""></a>
            </div>
        </div>

        <div class="nav-account">
            <form action="../processes/login-process.php" method="GET">
              <ul>
                <li> 
                  <h4>
                    <?=$userSelectedRow['FIRSTNAME']?> 
                    <?=$userSelectedRow['LASTNAME']?>
                  </h4>
                </li>

                <li>
                  <a href="../php/image-add.php"> My Account </a>
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
               <img src="../image/models/tp.jpg" alt="">
             </div>

             <div class="brands">
               <h1> Brands </h1>
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

             <div class="faqs">
             <h1> Faqs </h1>
               <ul>
                  <li><a href="#"> Other offer products </a></li>
                  <li><a href="#"> About us </a></li>
                  <li><a href="#"> Privacy policy </a></li>
                  <li><a href="#"> Terms and agreement </a></li>
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

           <form action="../processes/login-process.php" method="POST">
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
                      <img src="../image/icons/facebook (1).png" alt="">
                      <p>Facebook</p>
                  </button>
                  <button id="google-btn">
                      <img src="../image/icons/google.png" alt="">
                      <p> Google </p>
                  </button>
              </div>

              <div class="reg-now">
                  <p> Don't have an account? <span id="reg-click"> Register now. </span></p>
              </div>
        </div>

        <div class="container reg-box">
            <h1> Register here </h1>
            <form action="../processes/login-process.php" method="POST">
                <table>
                  <tr>
                    <td><input type="text" name="fname" placeholder="Firstname"></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="lname" placeholder="Lastname"></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="address"placeholder="Address"></td>
                  </tr>
                  <tr>
                    <td><input type="email" name="useremail" placeholder="Email address"></td>
                  </tr>
                  <tr>
                    <td><input type="password" name="pword" placeholder="Password"></td>
                  </tr>
                  <tr>
                    <td> <button type="submit" name="register-btn" id="register-btn"> Register </button></td>
                  </tr>
                </table>
            </form>

              <div class="log-now">
                  <p> Already have an account? <span id="log-click"> Sign in now. </span></p>
              </div>

              <div class="agree-terms">
                  <p> By signing up, you agree to our <a href="#"> terms and agreement </a></p>
              </div>
        </div>
    </div>
</div>





            

<!-- PRODUCT DETAILS -->

<div class="product-details-container">

    <div class="details-container">

        <div class="product-img">
            <div class="img">
                <img src="../Products/<?=$result['PICTURE']?>" alt="">
            </div>
            <div class="other-img">
                <ul>
                    <li> <img src="../Products/<?=$result['PICTURE']?>" alt=""></li>
                    <li> <img src="../Products/<?=$result['PICTURE']?>" alt=""></li>
                    <li> <img src="../Products/<?=$result['PICTURE']?>" alt=""></li>
                </ul>
            </div>
            
        </div>

        <div class="product-details">
            <h1 id="price"> &#8369; <?=$result['PRODUCTPRICE']?>.00 </h1>
            <h2> <?=$result['PRODUCTNAME']?> </h2>

            <div class="desc">
                <h3> Description </h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora dicta iste quo dolorum officiis consequatur assumenda et minus enim dignissimos rem quos optio provident laboriosam, quisquam alias incidunt quas soluta. 
                </p>
            </div>

            <div class="other-info">
                <select name="" id="">
                <option value="">Color</option>
                <?php
                    while($productcolor = oci_fetch_assoc($cquery)){
                ?>
                    <option value=""> <?=$productcolor['COLOR']?> </option>
                    <?php
                    }
                    ?>
                </select>

                <select name="" id="">
                    <option value=""> Size </option>
                    <?php
                    while($productsize = oci_fetch_assoc($squery)){
                    ?>
                   <option value=""><?=$productsize['PRODUCTSIZE']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="qty-container">
                <button> - </button>
                <input type="text" maxlength="2">
                <button> + </button>
                <p><?=$result['STOCKS']?> pieces available</p>
            </div>


            <div class="buttons-container">
                <button id="add-to-cart"> Add to cart </button>
                <button id="buy-now"> Buy now </button>
            </div>
        </div>
    </div>
</div>






<script src="../js/main.js"></script>
<script src="../js/clickable.js"></script>
</body>
</html>