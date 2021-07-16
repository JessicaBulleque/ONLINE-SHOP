<?php
    session_start();
    include "../connection.php";
    include "../processes/random.php";


    $userID = $_SESSION['userID'];
    $cart = $_SESSION['cart'];

    $dateTime = DATE('Y-m-d');
    $dateArrived = date('Y-m-d', strtotime ($dateTime . " +7 days"));

 
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

        
            // INSERT INTO TRANSACTION
            $ins = "INSERT INTO TRANSACTION (ID, CUSTOMERID, PRODUCTID, PRICE, QTY, TOTAL, DATEOFPURCHASE, DATEARRIVED, T_ID) VALUES($tID, $cID, $pID, $price, $qty, $total, '$dateTime', '$dateArrived', '$transactID')";
            $query = oci_parse($connection, $ins);

            // DELETE PRODUCT ON CART
            $del = oci_parse($connection, "DELETE FROM CART_TBL WHERE CARTID = $cartID");



            if(!$query){
                $e = oci_error();
                echo htmlentities($e["message"]);
            }else{
                oci_execute($query);
                oci_execute($del);
            }
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
    <meta http-equiv="refresh" content="5; url=http://localhost/ONLINE-SHOP/index.php">
    <link rel="stylesheet" href="./css/greetings.css">
    <title>Team Payaman | Clothing Line</title>
</head>
<body>
    <div class="ty-container">
        <div class="check">
            <img src="./icons/check1.png" alt="">
        </div>

        <h1>Thank You!</h1>
        <h2>Your order was confirmed.</h2>

        <p>You'll be redirect to home. Please wait after 5 seconds...</p>
        
    </div>
</body>
</html>