<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Add To Cart</title>
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
            <a href="index.php"><img src="./image/logo/logo.png" alt=""></a>
        </div>

        <div class="nav-links">
          <div class="search">
              <input type="search" name="search" id="search">
              <img src="./image/icons/search.png" id="search-icon">
          </div>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#" class="shop-icon" > Shop <img src="./image/icons/down-arrow.png" alt=""></a></li>
            </ul>

            <div class="cart">
                <a href="#"> <img src="./image/icons/shopping-bag.png"> </a>
            </div>

            <div class="account">
              <a href="#"> <img src="./image/icons/user.png" id="login-icon-click"> </a>
        
              <a id="user-profile"> <img src="./image/user-profile/<?=$userSelectedRow['PROFILEPIC']?>" alt=""></a>
            </div>
        </div>

        <div class="nav-account">
            <form action="./processes/login-process.php" method="GET">
              <ul>
                <li> 
                  <h4>
                    <?=$userSelectedRow['FIRSTNAME']?> 
                    <?=$userSelectedRow['LASTNAME']?>
                  </h4>
                </li>

                <li>
                  <a href="./php/image-add.php"> My Account </a>
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
               <img src="./image/models/tp.jpg" alt="">
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















<!--CART CONTAINER-->
<div class="cart-container">
    <div class="title">
        <h1>MY SHOPPING BAG</h1>
    </div>

    <div class="product-label">
            <ul>
                <li>Product Picture</li>
                <li>Product Name</li>
                <li>Price</li>
                <li>Quantity</li>
                <li>Total Price</li>
                <li>Actions</li>
            </ul>
        </div>

    <div class="item-container">
        <div class="item-box">
            <div class="product-image">
                <img src="./Products/BlackBossBag.png" alt="">
                <p>Boss Apparel Belt Bag</p>
            </div>

            <div class="product-actions">
                <ul>
                    <li>200</li>
                    <li>2</li>
                    <li>400</li>
                    <li><button>Delete</button></li>
                </ul>

            </div>


        </div>
    </div>
</div>

</body>
</html>