<?php
    session_start();
    include "../connection.php";
    include "./random.php";
   

    $userID = $_SESSION['userID'];

    $dateTime = DATE('Y-m-d');
    $dateArrived = date('Y-m-d', strtotime ($dateTime . " +7 days"));


    if(isset($_POST['checkout-btn'])){
        $cart = $_POST['cart'];

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
            $transactID = generateRandomString()."NXT";

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
                echo "SUCCESS";
            }
        }






    }


?>