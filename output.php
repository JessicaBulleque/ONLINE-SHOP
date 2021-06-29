<?php
    $username = "SYSTEM";
    $password = "masterkey";

    $connection = oci_connect($username, $password, "//localhost/orcl");

    if (!$connection) {
    $e = oci_error();
    echo htmlentities($e["message"]);
    }
    else{
        echo "SUCCESS";
    }

    $qry = "select * from products";

    $result = oci_parse($connection, $qry);
    oci_execute($result);

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php while($row = oci_fetch_array($result)) { ?>
        <h1> Hello world </h1>
    <?php } ?>
    
</body>
</html>