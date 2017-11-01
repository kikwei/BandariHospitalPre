
<?php
session_start();
if(isset($_SESSION['user_login'])) // Destroying All Sessions
{
	unset($_SESSION['user_login']);


header("Location: admin_login.php"); // Redirecting To Home Page
}
?>