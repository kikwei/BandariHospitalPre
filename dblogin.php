<?php
$connection = mysqli_connect('localhost:3306', 'root', "");
if (!$connection){
    die("Database Connection Failed" .mysqli_error($connection));
}
$select_db = mysqli_select_db($connection,'bandari2');
if (!$select_db){
    die("Database Selection Failed" .mysqli_error($connection));
}
?>