<?php
require("Connection.php");
$error = ""; // Initialize error as blank
session_start();
if(isset($_POST['submit'])){
$username=$_POST['username'];
//salting password
$salt="@g26jQsG&nh*&#8v";
$password=  sha1($_POST['password'].$salt);
	
$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);
//$connection = mysqli_connect('localhost:3306', 'root', "",'bandari');



$query=mysqli_query($connection,"SELECT USERNAME, PASSWORD FROM staff WHERE USERNAME='$username' AND PASSWORD='$password'");
$query1=mysqli_query($connection,"SELECT DEPARTMENT FROM staff WHERE USERNAME='$username'");
$rows=mysqli_num_rows($query);
$rows1=mysqli_num_rows($query1);
if($rows==1){
	$querArray=array();
	while($name=mysqli_fetch_array($query1)){
		$querArray=$name;
		//echo $name['DEPARTMENT'];
		if($name['DEPARTMENT']=='RECEPTION'){
			$_SESSION['username'] = $username;
			$_SESSION['rec_login'] = $username;
		header("Location:reception_staffhome.php");
			
		}
			else if($name['DEPARTMENT']=='CONSULTATION'){
			$_SESSION['cons_login'] = $username;
	header("Location:consultation_staffhome.php");
	}
	else if($name['DEPARTMENT']=='WARD'){
		$_SESSION['ward_login'] = $username;
		header("Location:ward_staffhome.php");
	}
	else if($name['DEPARTMENT']=='MORTUARY'){
		$_SESSION['mort_login'] = $username;
	    header("Location:mortuary.php");
    }

   else if($name['DEPARTMENT']=='PHARMACY')
    {
		$_SESSION['pharm_login'] = $username;
        header("Location:pharmacy_staffhomepage.php");
    }
	else if($name['DEPARTMENT']=='LABORATORY')
    {
	$_SESSION['lab_login']=$username;
        header("Location:lab_staffhome.php");
    }


}
}
else
{
 $error.='<p class="alert alert-danger">Wrong username or password </p>';
}
}


?>