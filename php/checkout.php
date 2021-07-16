<?php
    session_start();
    include "../connection.php";
    include "../processes/random.php";
   

    $userID = $_SESSION['userID'];

    $dateTime = DATE('Y-m-d');
    $dateArrived = date('Y-m-d', strtotime ($dateTime . " +7 days"));

    if(isset($_POST['checkout-btn'])){
        $cart = $_POST['cart'];

        $_SESSION['cart'] = $cart;

        echo '
        <table>
        <tr class="header-table">
            <td> Products </td>
            <td> Product Name </td>
            <td> Price </td>
            <td> Quantity </td>
            <td> Total Price </td>
        </tr>
        ';
        $sum = 0;
        $qtyCnt = 0;
        foreach($cart as $cartRows){
            // JOIN CART AND PRODUCT
            $joinQuery = "SELECT * FROM CART_TBL a
            JOIN PRODUCTS b
            ON a.PRODUCTID = b.PRODUCTID
            WHERE a.CARTID = $cartRows";
            $join = oci_parse($connection, $joinQuery);
            oci_execute($join);
            $cartSelected = oci_fetch_assoc($join);

            

            $cartID = $cartSelected['CARTID'];
            $cID = $cartSelected['CUSTOMERID'];
            $pID = $cartSelected['PRODUCTID'];
            $price = $cartSelected['PRODUCTPRICE'];
            $qty = $cartSelected['QTY'];
            $total = $cartSelected['PRODUCTPRICE'] * $cartSelected['QTY'];

            // COUNT TRANSACTION
            $countQ = oci_parse($connection, "SELECT COUNT(*) AS TOTAL FROM TRANSACTION");
            oci_execute($countQ);
            $count = oci_fetch_assoc($countQ);
            $tID = $count['TOTAL'] + 1;

            //TRANSACTION ID
            $transactID = generateRandomString();

            $_SESSION['trans'] = $transactID;

            echo '
            <tr>
                <td> <img src="../products/'.$cartSelected['PICTURE'].'"/> </td>
                <td>'.$cartSelected['PRODUCTNAME'].'</td>
                <td>'.$cartSelected['PRODUCTPRICE'].'</td>
                <td> '.$cartSelected['QTY'].' </td>
                <td>'.$total.' </td>
            </tr>
            ';

            $sum = $sum + $total;
            $qtyCnt = $qtyCnt + $cartSelected['QTY'];
        }

        echo '</table>';

    }

     // SELECT CUSTOMER
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
    <link rel="stylesheet" href="../css/style.css">
    <title> Checkout | Team Payaman </title>
</head>
<style>
    *{  
        font-family: 'Poppins';
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        padding: 7% 10%;
        padding-bottom: 10%;
        
    }
    header{
        left: 0;
        height: 10vh;
    }
    header .primary-header{
        height: 100%;
    }
    
    table{
        background: white;
        width: 100%;
        text-align: center;
    }
    table .header-table td{
        background: #f29b4277;
        color: #00000088;
    }
    table tr td{
        padding: 10px;
    }
    table tr td img{
        width: 180px;
        height: 150px;
    }
    .fixed-payment{
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80%;
        height: 15vh;
        background: #f29b42;
        z-index: 999;
        padding: 0 2%;
    }
    .fixed-payment table{
        width: 100%;
        height: 100%;
        background: none;
        color: white;
    }
    .fixed-payment table #price{
        border: none;
        background: none;
        font-size: 18px;
        color: white;
        font-weight: bold;
        text-align: center;
    }
    .fixed-payment table tr td{
        padding: 0 2%;
    }

    
    .delivery-address{ 
        background: #ffffff;
        border: 10px solid var(--primaryColor);
        padding-bottom: 5%;
        margin-top: 10px;
    }
    .delivery-address h2{
        padding: 0 5%;
        text-align: center;
    } 

    .delivery-address .user-info-address{
        position: relative;
        padding: 0 5%;
        line-height: 32px;
    } 
    .delivery-address .user-info-address table{
        width: max-content;
        text-align: left;
    }
    .delivery-address .user-info-address table tr td{
        padding: 2px 10px;
    }

    .delivery-address .user-info-address .button{
        position: absolute;
        right: 1%;
        bottom: 0;
    }

</style>

<body>

<!-- HEADER -->
<header>
    <div class="primary-header">
        <a href="../index.php"><img class="logo" src="../image/logo/Logo.svg" alt="Team Payaman Logo"> </a> 
         <nav class="user-nav">
              <a href="#" class="user-profile"> <img src="../image/user-profile/<?=$userSelectedRow['PROFILEPIC']?>" alt=""></a>
         </nav>
    </div>
   
</header>
<!-- HEADER - END -->


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

    <div class="fixed-payment">
        <div class="info">
            <table>
               <tr>
                   <td> Total Item </td>
                   <td> Subtotal </td>
                   <td> Shipping Fee </td>
                   <td> Payable Amount </td>
                   <td> Paymenth Method</td>
               </tr>
               <tr>
                   <td> <?=$qtyCnt?> </td>
                   <td> <?=$sum?>.00 </td>
                   <td> 60.00 </td>
                   <td> <input type="text" id="price" value="<?=$sum + 60?>.00" disabled> </td>
                   <td>
                        <div id="smart-button-container">
                            <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                            </div>
                        </div>
                   </td>
               </tr>
            </table>
        </div>
    </div>

















<script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=PHP" data-sdk-integration-source="button-factory"></script>

<script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'horizontal',
          label: 'checkout',
          
        },

        createOrder: function(data, actions) {
        var price = document.querySelector('#price').value;
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
            window.location = 'http://localhost/ONLINE-SHOP/php/email-send.php';
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