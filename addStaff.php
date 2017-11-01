<?php


$error = ""; 

if (isset($_POST['submit'])) { 
	$name = $_POST['fullName'];
	$pfnumber=$_POST['pfnumber'];
	$nationalId=$_POST['nationalId'];
	$department=$_POST['department'];
	$email = $_POST['email'];
	$username= $_POST['username'];
	$mobileNumber= $_POST['mobile'];
	
	 $salt="@g26jQsG&nh*&#8v";
     $password=  sha1($_POST['password'].$salt);
	
	$username=mysqli_real_escape_string($connection,$username);
	$password=mysqli_real_escape_string($connection,$password);

      $connection = mysqli_connect('localhost:3306', 'root', "",'bandari2');

	$dupEmail=mysqli_query($connection,"SELECT * FROM staff WHERE email ='".$_POST['email']."'");
	$rowId = mysqli_num_rows($dupEmail);
	if($rowId >0){
		$error .='<p class="alert alert-danger">The email provided is already registered.Please choose another.. </p>';
	}
	
	
$dupId=mysqli_query($connection,"SELECT * FROM staff WHERE NATIONALID ='".$_POST['nationalId']."'");
	$rowId = mysqli_num_rows($dupId);
	 if($rowId >0){
		$error .='<p class="alert alert-danger">The national Id provided is already registered. </p>';
	}
		
$dupPf=mysqli_query($connection,"SELECT * FROM staff WHERE PFNumber ='".$_POST['pfnumber']."'");
	$rowId = mysqli_num_rows($dupPf);
	 if($rowId >0){
		$error .='<p class="alert alert-danger">The PF Number provided is already registered. </p>';
	}

	
		else if (strlen($name) < 3 OR strlen($name) > 30) {
			$error .= '<p class="error"> Name should be within 3-30 characters long.</p>';
		}

	
		else if (strlen($nationalId) < 8 ) {
			$error .= '<p class="error"> National Id should be be atleast 8 characters.</p>';
		}



	 else	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
			$error .= '<p class="error">Enter a valid email address.</p>';
		}


	else	if (!ctype_digit($mobileNumber) OR strlen($mobileNumber) != 10) {
			$error .= '<p class="error">Enter a valid phone number</p>';
		}

else{

    mysqli_query($connection,"INSERT INTO staff(name,PFNumber,nationalid,department,phone,email,username,password)
VALUES('$name','$pfnumber','$nationalId','$department','$mobileNumber','$email','$username','$password')");

} 
				
}

 ?>