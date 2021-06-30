<?php
    session_start();
    include "../connection.php";

    if(isset($_POST['login-btn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $select = oci_parse($connection, "SELECT * FROM customeracc");
        oci_execute($select);

        while($userRow = oci_fetch_assoc($select)){
            if($email == $userRow['EMAIL'] && $pass == $userRow['PASS']){
                header("location:../index.php?");
                $_SESSION['userID'] = $userRow['USERID'];

            }
            else{
                echo "Login Failed";
            }
        }
    }
?>