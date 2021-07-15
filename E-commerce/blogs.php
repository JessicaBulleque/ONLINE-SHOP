<?php
    error_reporting(0);
    session_start();
    include "../connection.php";

    $userID = $_SESSION['userID'];

    
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
    <link rel="stylesheet" href="./css/blogs.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Team Payaman | Blogs</title>
</head>


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
              <a href="register.php" class="register-link">Register</a>
              <a href="login.php" class="login-link">Login</a>
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
            <li><a href="../php/all-product.php"> Products</a>  </li>
            <li><a href="blogs.php"  class="page"> Blogs </a>  </li>

        </ul>
    </div>
</header>
<!-- HEADER - END -->


    <!--BLOG BANNER-->
    <div class="banner">
        <div class="hero">
            <img src="./blogs/team-payaman.png" alt="">
        </div>

        <div class="tp-image">
            <img src="./icons/TEAM PAYAMAN's VLOG           CONTENTS.svg" alt="">
        </div>
        
    </div>
    <!--END-->



    <!--BLOG STARTS HERE-->
    <div class="blog-container">
        <div class="tp-vlog">
            
        </div>

        <div class="container">
            <ul>
                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=LBpHFAnsToA">
                        <img src="./blogs/vlog1.JPG" alt="">
                        </a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=LBpHFAnsToA">The Junnie Boy Prank</a> 
                    </div>
                </div>
                </li>

                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=Z02kIwn5mMU"><img src="./blogs/vlog2.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=Z02kIwn5mMU">The Junnie Boy Proposal</a>
                    </div>
                </div>
                </li>

                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=r_GqDsjgVqY"><img src="./blogs//Vlog3.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=r_GqDsjgVqY">ANNIBLAGSARY</a>
                    </div>
                </div>
                </li>




                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=4r_8Gcy5z7s"><img src="./blogs//vlog4.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=4r_8Gcy5z7s">Bts Concert | Welcome Home Safe Ariel</a>
                    </div>
                </div>
                </li>



                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=uK9WuLkGX7g"><img src="./blogs//vlog5.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=uK9WuLkGX7g">SINATRA</a>
                    </div>
                </div>
                </li>



                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=UU0AO1F7MOk"><img src="./blogs/vlog6.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=UU0AO1F7MOk">Back to back with Waldo</a>
                    </div>
                </div>
                </li>



                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=6kdLBK4OqTo"><img src="./blogs/vlog7.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=6kdLBK4OqTo">Surprise Birthday Party For Mama </a>
                    </div>
                </div>
                </li>


                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=TaEYBiCpnOs"><img src="./blogs/vlog8.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=TaEYBiCpnOs">Abutin mo ang pangarap beybe</a>
                    </div>
                </div>
                </li>


                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=TmTQeyPVcy8"><img src="./blogs/vlog9.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=TmTQeyPVcy8">Delivery Guy</a>
                    </div>
                </div>
                </li>


                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.facebook.com/watch/live/?v=324346475277989&ref=search"><img src="./blogs/ep1.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.facebook.com/watch/live/?v=324346475277989&ref=search">Payaman Insider | Episode 1</a>
                    </div>
                </div>
                </li>


                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=ZBJgPsSyMU8"><img src="./blogs/ep2.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=ZBJgPsSyMU8">Payaman Insider | Episode 2</a>
                    </div>
                </div>
                </li>


                

                <li>
                <div class="vlog-container">
                    <div class="vlog-image">
                        <a href="https://www.youtube.com/watch?v=_4nJv5nfhgI"><img src="./blogs/ep4.JPG" alt=""></a>
                    </div>

                    <div class="vlog-title">
                        <a href="https://www.youtube.com/watch?v=_4nJv5nfhgI">Payaman Insider | Episode 4</a>
                    </div>
                </div>
                </li>
            </ul>            
    </div>
    </div>
    <!--BLOG ENDS HERE-->







   
</body>
</html>