<?php


$error = ""; // Initialize error as blank

if (isset($_POST['submit'])) { // check if the form is submitted

	$name = $_POST['fullName'];
	
	$cardnumber = $_POST['cardnumber'];
	$dob=$_POST['dob'];
	$dod=$_POST['dod'];
	$gender=$_POST['gender'];
	$NationalId=$_POST['nationalId'];
    $birthcert=$_POST['birthcert'];
	$date = date("Y-m-d H:i:s");
	$age =$_POST['age'];
    $connection = mysqli_connect('localhost:3306', 'root', "",'bandari');   
	
    mysqli_query($connection,"INSERT INTO deceased(name,cardnumber,gender,nationalid,birthcert,birthdate,deathdate,age,post_date)
VALUES('$name','$cardnumber','$gender','$NationalId','$birthcert','$dob','$dod','$age','$date')");

 
				
}
?>