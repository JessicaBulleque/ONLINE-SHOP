<?php
    error_reporting(0);
    session_start();
    include "../connection.php";

    $userID = $_SESSION['userID'];
    $productID = $_GET['id'];

    // SELECT USERS'
    $selectUser = oci_parse($connection, "SELECT * FROM CUSTOMERACC WHERE USERID = $userID");
    oci_execute($selectUser);
    $userSelectedRow = oci_fetch_assoc($selectUser);

    // SELECT PRODUCT BASE ON PRODUCT ID
    $selectProduct = oci_parse($connection, "SELECT * FROM PRODUCTS WHERE PRODUCTID = $productID");
    oci_execute($selectProduct);    
    $selResult = oci_fetch_assoc($selectProduct);

    // SELECT ALL SIZE BASE ON PRODUCTS
    $selectColor = oci_parse($connection, "SELECT * FROM PRODUCT_COLOR WHERE PRODUCTID = $productID");
    oci_execute($selectColor);

    // SELECT ALL SIZE BASE ON PRODUCTS
    $selectSize = oci_parse($connection, "SELECT PRODUCTSIZE, SUBSTR(PRODUCTSIZE, 1,1) AS FIRSTLETTER FROM PRODUCT_SIZE WHERE PRODUCTID = $productID");
    oci_execute($selectSize);

    // SELECT ALL PRODUCT BASE ON BRAND'S SELECTED PRODUCT
    $brand = $selResult['BRAND'];
    $sameBrand = oci_parse($connection, "SELECT * FROM PRODUCTS WHERE BRAND = '$brand' AND PRODUCTID != $productID ORDER BY PRODUCTID DESC FETCH FIRST 5 ROWS ONLY");
    oci_execute($sameBrand);

    // SELECT ALL PRODUCT BASE ON TYPE'S SELECTED PRODUCT
    $type = $selResult['TYPE'];
    $sameType = oci_parse($connection, "SELECT * FROM PRODUCTS WHERE TYPE = '$type' AND PRODUCTID != $productID ORDER BY PRODUCTID DESC FETCH FIRST 5 ROWS ONLY");
    oci_execute($sameType);


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
<!--x HEADER x-->

    

<!-- PRODUCT DETAILS -->
<div class="details-container">
  <!-- SELECTED PRODUCT BASE ON USER'S PREFERENCE -->
  <div class="product-details-container">
    <!-- PRODUCT IMAGES AND INFO -->
      <div class="product-container product-img-container">
          <div class="product-img">
              <img src="../Products/<?=$selResult['PICTURE']?>" alt="">
          </div>
          <div class="related-img-product">
              <div class="row">
                  <div class="col">
                      <img src="../Products/Viytints.jpg" alt="">
                  </div>
                  <div class="col">
                      <img src="../Products/Viytints.jpg" alt="">
                  </div>
                  <div class="col">
                      <img src="../Products/Viytints.jpg" alt="">
                  </div>
                  <div class="col">
                      <img src="../Products/Viytints.jpg" alt="">
                  </div>
              </div>
          </div>
      </div>
      
      <div class="product-container product-info-details">
          <div class="product-title">
              <h2> <?=$selResult['PRODUCTNAME']?> </h2>
          </div>

          <div class="price"> 
            <h1> &#8369; <?=$selResult['PRODUCTPRICE']?>.00 </h1> 
          </div>
          
          <div class="product-description">
                <h3> Description </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quod soluta iusto assumenda, in natus consequuntur repellendus accusantium laborum odit molestiae! Ullam est iure natus alias? Amet iusto, recusandae quos voluptates vitae quia libero animi illo deserunt dolorem exercitationem labore dolore inventore molestias, similique voluptas ut debitis explicabo dicta praesentium.</p>
          </div>

          <div class="product-color">
              <label for=""> Color </label>
              <ul>
                <?php while($color = oci_fetch_assoc($selectColor)) { ?>
                    <div class="color-container">
                        <p> <?=$color['COLOR']?> </p>
                        <input type="radio" name="color" value="<?=$color['COLOR']?>">
                    </div>
                <?php } ?>
              </ul>
          </div>

          <div class="product-size">
            <label for=""> Size </label>
                <ul>
                  <?php while($size = oci_fetch_assoc($selectSize)) { ?>
                    <div class="size-container">
                        <p> <?=$size['FIRSTLETTER']?> </p>
                        <input type="radio" name="size" value="<?=$size['PRODUCTSIZE']?>">
                    </div>
                  <?php } ?>
                </ul>
          </div>

          <div class="product-quantity">
            <label for=""> Quantity </label>
              <div class="qty">
                <button> - </button>
                <input type="text" name="qty" value="1" maxlength="2">
                <button> + </button>

                <p class="stocks"> <?=$selResult['STOCKS']?></span> Stocks 
              </div>
          </div>

          <div class="function-button">
                <button class="add-to-cart"> Add to cart </button> <br>
                <button class="buy-now"> Buy now </button>
          </div>
      </div>
    <!-- PRODUCT IMAGES AND INFO -->
  </div>


  <!-- PRODUCTS FROM THE SAME BRAND -->
  <div class="same-brand-container">
      <div class="title-container">
          <h2> Products from the same brand </h2>
          <a href="#"> See all </a>
      </div>
      <div class="same-brand">
          <ul>
            <?php while($brandSelected = oci_fetch_assoc($sameBrand)) { ?>
              <li>
                <div class="product-box">
                  <div class="container image-holder">
                      <a href="../php/product-details.php?id=<?=$brandSelected['PRODUCTID']?>"> 
                        <img src="../Products/<?=$brandSelected['PICTURE']?>"> 
                      </a>
                  </div>
                  <div class="container product-info-holder">
                      <h3> &#8369; <?=$brandSelected['PRODUCTPRICE']?>.00 </h3>
                      <p> <?=$brandSelected['PRODUCTNAME']?> </p>
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
  </div>

  <div class="review-container">
      <div class="review-title">
          <h2> Product review </h2>
      </div>
      <div class="user-review-container">
          <div class="user-name">
              <div class="profile-pic">
                  <img src="../image/user-profile/default-profile.jpg" alt="">
              </div>
              <div class="user">
                  <p> Mark Melvin Bacabis </p>
              </div>
          </div>
          <div class="user-review">
              <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. At tempora vel sint ut nobis dolore commodi pariatur, beatae excepturi quibusdam laudantium aperiam adipisci, tenetur temporibus, reprehenderit porro quia corrupti nulla totam ipsa? Atque culpa aliquid distinctio odit rem praesentium, quae ipsum sapiente qui, saepe, fugiat omnis. Et praesentium fugiat eius!</p>
          </div>
      </div>
      <div class="user-review-container">
          <div class="user-name">
              <div class="profile-pic">
                  <img src="../image/user-profile/default-profile.jpg" alt="">
              </div>
              <div class="user">
                  <p> Mark Melvin Bacabis </p>
              </div>
          </div>
          <div class="user-review">
              <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. At tempora vel sint ut nobis dolore commodi pariatur, beatae excepturi quibusdam laudantium aperiam adipisci, tenetur temporibus, reprehenderit porro quia corrupti nulla totam ipsa? Atque culpa aliquid distinctio odit rem praesentium, quae ipsum sapiente qui, saepe, fugiat omnis. Et praesentium fugiat eius!</p>
          </div>
      </div>
      <div class="user-review-container">
          <div class="user-name">
              <div class="profile-pic">
                  <img src="../image/user-profile/default-profile.jpg" alt="">
              </div>
              <div class="user">
                  <p> Mark Melvin Bacabis </p>
              </div>
          </div>
          <div class="user-review">
              <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. At tempora vel sint ut nobis dolore commodi pariatur, beatae excepturi quibusdam laudantium aperiam adipisci, tenetur temporibus, reprehenderit porro quia corrupti nulla totam ipsa? Atque culpa aliquid distinctio odit rem praesentium, quae ipsum sapiente qui, saepe, fugiat omnis. Et praesentium fugiat eius!</p>
          </div>
      </div>
      <div class="user-review-container">
          <div class="user-name">
              <div class="profile-pic">
                  <img src="../image/user-profile/default-profile.jpg" alt="">
              </div>
              <div class="user">
                  <p> Mark Melvin Bacabis </p>
              </div>
          </div>
          <div class="user-review">
              <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. At tempora vel sint ut nobis dolore commodi pariatur, beatae excepturi quibusdam laudantium aperiam adipisci, tenetur temporibus, reprehenderit porro quia corrupti nulla totam ipsa? Atque culpa aliquid distinctio odit rem praesentium, quae ipsum sapiente qui, saepe, fugiat omnis. Et praesentium fugiat eius!</p>
          </div>
      </div>

      <div class="user-comment">

      </div>
  </div>

  <div class="same-brand-container">
      <div class="title-container">
          <h2> Similar products </h2>
          <a href="#"> See all </a>
      </div>
      <div class="same-brand">
          <ul>
          <?php while($typeSelected = oci_fetch_assoc($sameType)) { ?>
            <li>
              <div class="product-box">
                  <div class="container image-holder">
                      <a href="../php/product-details.php?id=<?=$typeSelected['PRODUCTID']?>"> <img src="../Products/<?=$typeSelected['PICTURE']?>"> </a>
                  </div>
                  <div class="container product-info-holder">
                      <h3> &#8369;<?=$typeSelected['PRODUCTPRICE']?>.00 </h3>
                      <p> <?=$typeSelected['PRODUCTNAME']?> </p>
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
  </div>

</div>

<!--x PRODUCT DETAILS x-->



<script src="../js/main.js"></script>
<script src="../js/clickable.js"></script>
</body>
</html>