<?php
    session_start();
    include "../connection.php";

    $userID = $_SESSION['userID'];

    $sel = oci_parse($connection, "SELECT * FROM CUSTOMERACC WHERE USERID = $userID");
    oci_execute($sel);

    $img = oci_fetch_assoc($sel);


    if(isset($_POST['change'])){
        $profile = $_POST['img-file'];

        $upd = oci_parse($connection, "UPDATE CUSTOMERACC SET PROFILEPIC = '$profile' WHERE USERID = $userID");
        oci_execute($upd);

        header("location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    img{
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }
</style>
<body>
    <h2> <?=$img['FIRSTNAME']?> <?=$img['LASTNAME']?></h2>
    <img src="../user-profile/<?=$img['PROFILEPIC']?>" alt="">
    <form action="image-add.php" method="POST">
        <input type="file" name="img-file" id="img"> <br>
        <button type="submit" name="change"> Change Profile </button>
    </form>
    
</body>
</html>