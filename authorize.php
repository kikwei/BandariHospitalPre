<?php
/*
 * Authorization Check
 * by Sanjay Prasad
 * sonzoy@gmail.com
 * http://www.openplus.in
 */

if(!isset($_SESSION['user_login'])){
 header('Location:admin_login.php');
		die();
}
?>
