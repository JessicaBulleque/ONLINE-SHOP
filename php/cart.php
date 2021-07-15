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
  </head>

      <style>
          .user-nav{
            display: flex;
          }
      </style>


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
  <section class="delivery-address"> 

      <h2> DEFAULT DELIVERY ADDRESS </h2>

      <div class="user-info-address">
        <table >
          <tr>
            <td> Name: </td>
            <td> <?=$userSelectedRow['FIRSTNAME'].' '.$userSelectedRow['LASTNAME']?></td>
          </tr>

          <tr>
            <td> Address: </td>
            <td> <?=$userSelectedRow['ADDRESS']?> </td>
          </tr>

          <tr>
            <td> Zip code: </td>
            <td> <?=$userSelectedRow['ZIP']?> </td>
          </tr>

          <tr>
            <td> Email: </td>
            <td> <?=$userSelectedRow['EMAIL']?> </td>
          </tr>
        </table>

        <div class="button">
            <a href="#"> Edit Delivery Address </a>
        </div>
      </div>
  </section>

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
          <?php 
             while($cartRow = oci_fetch_assoc($cartQuery)) { ?> 
          
            <tr>
                <td> <input type="checkbox" name="" id=""> </td>
                <td> <img src="../products/<?=$cartRow['PICTURE']?>"></td>
                <td> <h3> <?=$cartRow['PRODUCTNAME']?></h3> </td>
                <td> <p> <?=$cartRow['PRODUCTPRICE']?> </p> </td>
                <td> <?=$cartRow['QTY']?>  </td>
                <td> <?=$cartRow['PRODUCTPRICE'] * $cartRow['QTY']?>  </td>
                <td> <button class="del-btn"> Delete </button> </td>
            </tr>
            <tr> <td colspan="7"> <hr> </td> </tr>
          <?php } ?>
      </table>

      <table class="order-summary" border="0">
        <tr>
          <th colspan="2"> ORDER SUMMARY </th>
        </tr>
        <tr>
          <td> Total Item </td>
          <td> 3 </td>
        </tr>
        <tr>
          <td> Subtotal </td>
          <td> 400.00 </td>
        </tr>
        <tr>
          <td> Shipping Fee </td>
          <td> 60.00 </td>
        </tr>
        <tr>
          <td colspan="2"> <hr></td>
        </tr>
        <tr>
          
          <td> Total Amount </td>
          <td class="price"> <input type="text" id="price" value="300.00"> </td>
        </tr>
        <tr>
          <td colspan="2">
               <div id="smart-button-container">
                <div style="text-align: center;">
                  <div id="paypal-button-container"></div>
                </div>
              </div>  
          </td>
        </tr>

      </table>
      
  </section>  
</div>


<script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=PHP" data-sdk-integration-source="button-factory"></script>

<script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'black',
          layout: 'horizontal',
          label: 'checkout',
          
        },

        createOrder: function(data, actions) {
      const price = document.querySelector("#price").value;
      return actions.order.create({
        purchase_units: [{
                        description:'Sample',
                        amount: {
                            value:price
                        },
                        tax_total:{
                            value:42
                        }
                    }]
      });
    },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            window.location = 'http://localhost/ONLINE-SHOP/e-commerce/thankyou.php';
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>

  </body>
</html>