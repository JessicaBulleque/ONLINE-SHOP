<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- STYLE LINK -->
      
      <link rel="stylesheet" href="../css/cart-style.css">
      <title>Add To Cart</title>
  </head>


<body>

<!-- HEADER -->
<header>
    <div class="primary-header">
        <a href="index.php"><img class="logo" src="../image/logo/Logo.svg" alt="Team Payaman Logo"> </a>

         <nav class="secondary-nav">
              <a href="#" class="register-link">Register</a>
              <a href="#" class="login-link">Login</a>
         </nav>
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
                  <td> Jessica Bulleque </td>
                </tr>
                <tr>
                  <td> Address: </td>
                  <td> Pinagkaisa St., Commonwealth, Quezon City </td>
                </tr>
                <tr>
                  <td> Zip code: </td>
                  <td> 1121 </td>
                </tr>
                <tr>
                  <td> Email: </td>
                  <td> isca5027@gmail.com </td>
                </tr>
              </table>

              <div class="button">
                  <a href="#"> Edit Delivery Address </a>
              </div>
          </div>
      </section>


      <section class="my-cart-container">
        <h1> MY SHOPPING BAG </h1>

        <div class="label-container">
           <ul>
             <li> Product </li>
             <li> Product Name </li>
             <li> Price </li>
             <li> Qty </li>
             <li> Total Price </li>
             <li> Action </li>
           </ul>
        </div>

        <div class="cart-container">
          <div class="select-all">
              <input type="checkbox" name="checkAll" id="check-all"> <label for="check-all"> Select All (5) </label> 
          </div>

          <div class="cart-box-container">
              <div class="cart-box">
                      <div class="check-box">
                        <input type="checkbox" name="isCheck" id="">
                      </div>

                      <div class="product-img">
                        <img src="../Products/TP1.png" alt="Product">
                      </div>

                      <div class="product-title">
                        <h2> Boss Apparel </h2>
                      </div>

                      <div class="price">
                        <h3> 350.00 </h3>
                      </div>
                     
                      <div class="quantity-container">
                        <button> - </button> <input type="text" name="qty" value="1"> <button> + </button>
                      </div>

                      <div class="total-price">
                          <h3> 350.00 </h3>
                      </div>

                      <div class="action-delete">
                          <a href="#"> Delete </a>
                      </div>
              </div>
              
              
          </div>
        </div>
      </section>  
    </div>

    <div class="order-summary-container">
              <table class="order-info">
                <tr>
                  <td> Total Items </td>
                  <td> 3 </td>
                </tr>
                <tr>
                  <td> Subtotal </td>
                  <td> 1035.00 </td>
                </tr>
                <tr>
                  <td> Shipping Fee </td> 
                  <td> 60.00 </td>
                </tr>
              </table>

          <div class="payment">
              <table>
                <tr> 
                  <td> Total Payment: </td>
                  <td> <h3> 1260.00 </h3> </td>
                  <td> <button> <span> Pay with </span> Paypal </button></td>
                </tr>
              </table>
          </div>
    </div>
  </body>
</html>