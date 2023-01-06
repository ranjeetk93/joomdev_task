<?php

$dname = "localhost";

$duname = "root";

$dpassword = "";

$db_name = "joomdev_db";

$conn = mysqli_connect($dname, $duname, $dpassword, $db_name);

if (!$conn) {

    echo "Connection failed!";
    exit;

}