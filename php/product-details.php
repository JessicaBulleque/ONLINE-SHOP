<?php
    include "../connection.php";

    $productID = $_GET['id'];

    $query = oci_parse($connection, "select * from products where PRODUCTID = '$productID'");

    oci_execute($query);

    $result = oci_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?=$result['PRODUCTNAME']?> | TEAM PAYAMAN </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/product-detials.css">
</head>
<body>

<!--HEADER -->

    <header>
            <div class="logo">
                <a href="index.php"><img src="../logo/logo.png" alt=""></a>
            </div>

            <div class="nav-links">
            <div class="search">
                <a href="#"><img src="../icons/search.png" alt=""></a>
            </div>

                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#" onclick="shopIsHover()" class="shop-icon" >Shop <img src="../icons/down-arrow.png" alt=""></a></li>
                </ul>

                <div class="cart">
                    <a href="#"><img src="../icons/shopping-bag.png" alt=""></a>
                </div>

                <div class="account">
                    <a href="#"><img src="../icons/user.png" id="login-icon-clicked"></a>
                </div>

            </div>


            <!--SHOP HOVER-->
            <div class="shop-hover">
                <div class="hover-image">
                <img src="../models/tp.jpg" alt="">
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
    <!-- LOGIN MODAL -->
<!--HEADER -->



<!-- PRODUCT DETAILS -->

<div class="product-details-container">

    <div class="details-container">

        <div class="product-img">
            <div class="img">
                <img src="../shirts/<?=$result['PICTURE']?>" alt="">
            </div>
            <div class="other-img">
                <ul>
                    <li> <img src="../shirts/<?=$result['PICTURE']?>" alt=""></li>
                    <li> <img src="../shirts/<?=$result['PICTURE']?>" alt=""></li>
                    <li> <img src="../shirts/<?=$result['PICTURE']?>" alt=""></li>
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
                    <option value=""> Color </option>
                    <option value=""> Black </option>
                    <option value=""> White </option>
                    <option value=""> Orange </option>
                </select>

                <select name="" id="">
                    <option value=""> Size </option>
                    <option value=""> S </option>
                    <option value=""> M </option>
                    <option value=""> L </option>
                </select>
            </div>

            <div class="qty-container">
                <button> - </button>
                <input type="text" maxlength="2">
                <button> + </button>
            </div>

            <div class="buttons-container">
                <button id="add-to-cart"> Add to cart </button>
                <button id="buy-now"> Buy now </button>
            </div>
        </div>
    </div>
</div>






<script src="../js/main.js"></script>
</body>
</html>