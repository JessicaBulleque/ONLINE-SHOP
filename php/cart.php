<?php
    
    session_start();
    include "../connection.php";

    $userID = $_SESSION['userID'];

    if(empty($userID)){
      header("location:../index.php");
    }

    // SELECT CUSTOMER
    $selectUser = oci_parse($connection, "SELECT * FROM CUSTOMERACC WHERE USERID = $userID");
    oci_execute($selectUser);

    $userSelectedRow = oci_fetch_assoc($selectUser);


    // CART COUNT
    $countItem = oci_parse($connection, "SELECT COUNT(*) AS TOTAL FROM CART_TBL WHERE CUSTOMERID = $userID");
    oci_execute($countItem);

    $itemCount = oci_fetch_assoc($countItem);

    // SELECT CART BASED ON CUSTOMER ID
    $cartQuery = oci_parse($connection, "SELECT * FROM CART_TBL a
    JOIN CUSTOMERACC b
    ON a.CUSTOMERID = b.USERID
    JOIN PRODUCTS c
    ON a.PRODUCTID = c.PRODUCTID
    WHERE a.CUSTOMERID = $userID");

    oci_execute($cartQuery);



?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- STYLE LINK -->
      
      <link rel="stylesheet" href="../css/cart-style.css">
      <link rel="stylesheet" href="../css/style.css">
      <title> Cart </title>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>

<style>
  .user-nav{
    display: flex;
  }
</style>

<script>
    $(document).ready(function(){
        
        $('.cart').click(function(){
            var subtotal = document.querySelectorAll('.totalPrice');
            var sum;
            var count = $('input[type="checkbox"]:checked').length;
            $('#totalItem').html(count);


            var text = 0;
            $('.cart:checked').each(function(){
                text += $('.totalPrice').val();
               
            });
            $('#subtotal').html(text);
        });
    });
</script>


<body>

<!-- HEADER -->
<header>
    <div class="primary-header">
        <a href="../index.php"><img class="logo" src="../image/logo/Logo.svg" alt="Team Payaman Logo"> </a>

         <div class="search-bar">
              <input type="search" id="search" name="search" placeholder="Search products here">
              <button class="search-icon"> Search </button>
         </div>
         
         <nav class="user-nav">
              <a href="cart.php" class="cart-icon">
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


<div class="container">

  <h1 style="border-top: 2px dotted black; padding-top: 2%;"> MY SHOPPING BAG </h1>
  <section class="my-cart-container">
     
      <table border="0">
          <tr class="header">
              <td> <input type="checkbox" name="checkAll" id="checkAll"> </td>
              <td> Products</td>
              <td> Product Name </td>
              <td> Price </td>
              <td> Quantity </td>
              <td> Total Price </td>
              <td> Action </td>
          </tr>
    <form action="../php/checkout.php" method="POST">
          <?php 
             while($cartRow = oci_fetch_assoc($cartQuery)) { ?> 
          
            <tr>
                <td> <input type="checkbox" name="cart[]" class="cart" value="<?=$cartRow['CARTID']?>"> </td>
                <td> <img src="../products/<?=$cartRow['PICTURE']?>"></td>
                <td> <h3> <?=$cartRow['PRODUCTNAME']?></h3> </td>
                <td> <p> <?=$cartRow['PRODUCTPRICE']?> </p> </td>
                <td > <?=$cartRow['QTY']?>  </td>
                <td> <p class="totalPrice"> <?=$cartRow['PRODUCTPRICE'] * $cartRow['QTY']?> </p> </td>
                <td> <button class="del-btn"> Delete </button> </td>
            </tr>
            <tr> <td colspan="7"> <hr> </td> </tr>
          <?php } ?>
      </table>
      <input type="submit" value="CHECKOUT" name="checkout-btn" class="check-btn">
    </form>
      
  </section>  
</div>

<script>

</script>

<script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=PHP" data-sdk-integration-source="button-factory"></script>


  </body>
</html>