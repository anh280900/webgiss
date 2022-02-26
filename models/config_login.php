<?php
$server_username = "root";
$server_password = "anh2809";
$server_host = "localhost";
$database = 'datagis';

$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");