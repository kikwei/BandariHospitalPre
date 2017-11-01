

<?php
//session_start();
//if(isset($_SESSION['user_login'])) // Destroying All Sessions
//{
	//unset($_SESSION['user_login']);


//header("Location:index.php.php"); // Redirecting To Home Page
//}

session_start();
if(session_destroy()){
	header("Location:staff_login.php");
}
?>