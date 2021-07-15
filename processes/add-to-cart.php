<?php
    session_start();
    include "../connection.php";
    
    $userID = $_SESSION['userID'];
    $prod = $_SESSION['prodID'];

    // CART COUNT
    $countItem = oci_parse($connection, "SELECT COUNT(*) AS TOTAL FROM CART_TBL");
    oci_execute($countItem);

    $itemCount = oci_fetch_assoc($countItem);

    $cartID = $itemCount['TOTAL'] + 1;
    
    $quantity = $_POST['quantity'];

    
    // INSERT TO PRODUCT ID
    $ins = oci_parse($connection, "INSERT INTO CART_TBL (CARTID, CUSTOMERID, PRODUCTID, QTY) VALUES ($cartID, $userID, $prod, $quantity)");

    oci_execute($ins);


    // CART COUNT BASED ON USER ID
    $countItemUser = oci_parse($connection, "SELECT COUNT(*) AS TOTAL FROM CART_TBL WHERE CUSTOMERID = $userID");
    oci_execute($countItemUser);

    $itemCountUser = oci_fetch_assoc($countItemUser); 

    echo $itemCountUser['TOTAL'];
    
?>