<?php
define("DB_SERVER", "localhost");
define("DB_USER", "myRoot");
define("DB_PASS", "123456");
define("DB_NAME", "mystore_corp");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        "(" . mysqli_connect_errno() . ")"
    );
}          
?>