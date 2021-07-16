<?php
    session_start();
    include "../connection.php";

    if(isset($_POST['login-btn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        

        $select = oci_parse($connection, "SELECT * FROM customeracc");
        oci_execute($select);

        while($userRow = oci_fetch_assoc($select)){
            echo $userRow['EMAIL']." ";
            echo $userRow['PASS']."<br>";
            if($email == $userRow['EMAIL'] && $pass == $userRow['PASS']){
                $_SESSION['userID'] = $userRow['USERID'];
                header("location:../index.php");
            }/*
            else{
                header("location: ../E-commerce/login.php?Failed");
            }*/
        }
    }


    if(isset($_POST['register-btn'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $address = "";
        $emailadd = $_POST['useremail'];
        $password = $_POST['pword'];
        $rePass = $_POST['r-pword'];

        $sel = oci_parse($connection, "SELECT COUNT(*) AS TOTAL FROM customeracc");
        oci_execute($sel);
        $cnt = oci_fetch_assoc($sel);

        $custID = 21000 + ($cnt['TOTAL'] + 1);

        $ins = oci_parse($connection, "INSERT INTO customeracc (USERID, FIRSTNAME, LASTNAME, PROFILEPIC, ADDRESS, EMAIL, PASS) VALUES ($custID, '$firstname','$lastname','default-profile.jpg','$address', '$emailadd', '$password')
        ");

        if($password === $rePass){
            oci_execute($ins);

            $_SESSION['userID'] = $custID;
            header("location:../index.php");
        }
        
       
        
        
    }

    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
        header("location:../index.php");
      }

?>