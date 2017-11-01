<?php


$error = ""; 

if (isset($_POST['submit'])) { 

	$name = $_POST['fullName'];
	$dob=$_POST['dob'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$residence=$_POST['residence'];
	$phone=$_POST['mobile'];
	$PhoneOfKin=$_POST['phoneofkin'];
	$NationalId=$_POST['nationalId'];
     $birthcert=$_POST['birthcert'];
	$cardnumber=$_POST['cardnumber'];
	$date = date("Y-m-d H:i:s");
    $connection = mysqli_connect('localhost:3306', 'root', "",'bandari2');
	
$dupcard=mysqli_query($connection,"SELECT * FROM patients WHERE CardNumber ='".$_POST['cardnumber']."'");
	$rowId = mysqli_num_rows($dupcard);
	if($rowId >0){
		$error .='<p class="alert alert-danger">The Card Number provided is already registered. </p>';
	}

		else if (!ctype_digit($phone) OR strlen($phone) != 10) {
			$error .= '<p class="error">Enter a valid phone number.</p>';
		}
		else if (strlen($NationalId) < 8 ) {
			$error .= '<p class="error"> National Id should be be atleast 8 characters.</p>';
		}
else{
    mysqli_query($connection,"INSERT INTO patients(name,dob,age,Gender,Residential,Phone,PhoneOfKin,NationalId, BirthCertNo, CardNumber,registration_date)
VALUES('$name','$dob','$age','$gender','$residence','$phone','$PhoneOfKin','$NationalId','$birthcert','$cardnumber','$date')");

 
				
}
}
?>