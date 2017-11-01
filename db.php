<?php
$connection = mysqli_connect('localhost:3306', 'root', "",'bandari');
if (!$connection){
    die("Database Connection Failed" .mysqli_error());
}

?>