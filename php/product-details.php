<?php
    error_reporting(0);
    session_start();
    include "../connection.php";

    $userID = $_SESSION['userID'];
    $productID = $_GET['id'];   
    $_SESSION['prodID'] = $productID;

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
    <title> <?=$selResult['PRODUCTNAME']?> | TEAM PAYAMAN </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../image/icons/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/product-detials.css">

     <!-- aJax jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
</head>


<script>
       $(document).ready(function(){

      $(".add-to-cart").click(function(){
          var addBtn = $(".add-to-cart");
          var qty = $("#qty").val();

          $.post("../processes/add-to-cart.php", {
            quantity: qty
          }, function(data, status){
                $(".count-cart").html(data);
          });
      });
   });
</script>



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
              <a href="./cart.php" class="cart-icon">
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
            <li><a href="./all-product.php"> Products</a>  </li>
            <li><a href="../E-commerce/blogs.php"> Blogs </a>  </li>

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
          <!--
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
          </div>-->

          <div class="product-size">
            <label for=""> Size </label>
                <ul>
                  <?php 
                    if(oci_fetch_row($selectSize) > 0) {
                        while($size = oci_fetch_assoc($selectSize)) { ?>
                            <div class="size-container">
                                <p> <?=$size['PRODUCTSIZE']?> </p>
                                <input type="radio" name="size" value="<?=$size['PRODUCTSIZE']?>">
                            </div>
                        <?php }
                    } else { ?>
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
                <input type="text" name="qty" id="qty" value="1" maxlength="2">
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