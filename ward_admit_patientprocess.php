<?php


$error = ""; // Initialize error as blank

if (isset($_POST['submit'])) { // check if the form is submitted


	$room=$_POST['room'];
	$ward=$_POST['ward'];
	$date = date("Y-m-d H:i:s");
	$id= $_GET['patients_id'];
    $connection = mysqli_connect('localhost:3306', 'root', "",'bandari');   
	//start validating input data 
	
	//check if card number is registered
$dupcard=mysqli_query($connection,"SELECT * FROM admitted_patients WHERE cardnumber ='".$_GET['patients_id']."' AND AdmissionStatus='admitted'");
	$rowId = mysqli_num_rows($dupcard);
	if($rowId >0){
		$error .='<p class="alert alert-danger">The Card Number provided is already registered. </p>';
	}

    mysqli_query($connection,"INSERT INTO admitted_patients( cardnumber,ward,room,Admission_date)
VALUES('$id','$ward','$room','$date')");
mysqli_query($connection,"UPDATE admitted_patients SET AdmissionStatus='admitted' WHERE cardnumber='$id'");
mysqli_query($connection,"UPDATE consult_ward SET WardStatus='attended' WHERE cardnumber='$id'");
 
				
}
?>