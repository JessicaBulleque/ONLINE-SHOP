<?php
    $username = "SYSTEM";
    $password = "masterkey";
    
    // CHANGE THIS "//localhost/xe" BASED ON YOUR DATABASE SID
    $connection = oci_connect($username, $password, "//localhost/orcl");

    // IF THE CONNECTION HAS ERROR
    if (!$connection) {
      // IT WILL DISPLAY THE ERROR MESSAGE
    $e = oci_error();
    echo htmlentities($e["message"]);
    }

?>