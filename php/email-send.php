<?php
    session_start();
    include "../connection.php";
    include "../processes/random.php";


    $userID = $_SESSION['userID'];

    // SELECT CUSTOMER
    $selectUser = oci_parse($connection, "SELECT * FROM CUSTOMERACC WHERE USERID = $userID");
    oci_execute($selectUser);
 
    $userSelectedRow = oci_fetch_assoc($selectUser);
    $transactionID = $_SESSION['trans'];


$email_to = $userSelectedRow['EMAIL'];
$subject = "TEAM PAYAMAN CLOTHING";
$header = "From: Team Payaman Clothing";
$message = "Hi ".$userSelectedRow['FIRSTNAME']." ".$userSelectedRow['LASTNAME']." Your Transaction ID is: ".$transactionID."";

if(mail($email_to, $subject, $message, $header)){
    header("location:../E-commerce/thankyou.php");
}
?>