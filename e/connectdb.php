<?php
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "4032db";
    $conn = mysqli_connect($host, $user, $pwd, $db) or die;
    mysqli_query($conn, "SET NAMES utf8");
?>