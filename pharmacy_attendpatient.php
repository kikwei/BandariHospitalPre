<?php
require_once ('Connection.php');
session_start();

if(!isset($_SESSION['pharm_login']))
    header('Location:staff_login.php');
if(isset($_GET['patients_id'])) {
    $sql = "UPDATE `consultpharm` SET `Status`='ATTENDED' WHERE cardnumber='" . $_GET['patients_id'] . "'";
    $result = mysqli_query($connection,$sql);

    

}
?>