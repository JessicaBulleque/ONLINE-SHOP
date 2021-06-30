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


    if(isset($_POST['register-btn'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $address = $_POST['address'];
        $emailadd = $_POST['useremail'];
        $password = $_POST['pword'];

        $sel = oci_parse($connection, "SELECT COUNT(*) AS TOTAL FROM customeracc");
        oci_execute($sel);
        $cnt = oci_fetch_assoc($sel);

        $custID = 21000 + ($cnt['TOTAL'] + 1);

        echo $custID."<br>";
        echo $firstname."<br>";
        echo $lastname."<br>";
        echo $address."<br>";
        echo $emailadd."<br>";
        echo $password."<br>";

        $ins = oci_parse($connection, "INSERT INTO customeracc (USERID, FIRSTNAME, LASTNAME, PROFILEPIC, ADDRESS, EMAIL, PASS) VALUES ($custID, '$firstname','$lastname','default-profile.jpg','$address', '$emailadd', '$password')
        ");

        oci_execute($ins);

        $_SESSION['userID'] = $custID;
        header("location:../index.php");
       
        
        
    }

    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
        header("location:../index.php");
      }
        
?>