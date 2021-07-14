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

    // SELECT ALL COLOR BASE ON PRODUCTS
    $selectColor = oci_parse($connection, "SELECT * FROM PRODUCT_COLOR WHERE PRODUCTID = $productID");
    oci_execute($selectColor);

    // SELECT ALL SIZE BASE ON PRODUCTS
    $selectSize = oci_parse($connection, "SELECT * FROM PRODUCT_SIZE WHERE PRODUCTID = $productID");
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
    <div class="primary-header">
        <a href="../index.php"><img class="logo" src="../image/logo/Logo.svg" alt="Team Payaman Logo"> </a>

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
            <li><a href="#"> Home </a> </li>
            <li><a href="#"> Products</a> </li>
            <li><a href="#"> Blogs </a>  </li>

        </ul>
    </div>
</header>
<!-- HEADER - END -->


    

<!-- PRODUCT DETAILS -->
<div class="details-container">
  <!-- SELECTED PRODUCT BASE ON USER'S PREFERENCE -->
  <div class="product-details-container">
    <!-- PRODUCT IMAGES AND INFO -->
      <div class="product-container product-img-container">
          <div class="product-img">
              <img src="../Products/<?=$selResult['PICTURE']?>" alt="">
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
                        <p> <?=$size['PRODUCTSIZE']?> </p>
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
                  <p> Juliana Balingasa</p>
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
                  <p> Jessica Bulleque </p>
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
                  <p> Justine Halliasgo </p>
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
                  <p> Angelica Jalmasco </p>
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
                  <p> Theresa Lopez </p>
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
                  <p> Jovelyn Vitales </p>
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