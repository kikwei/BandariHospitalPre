

<?php
include 'dblogin.php';
@$name=  mysqli_real_escape_string($connection,$_REQUEST['edit_name']);
@$gender=  mysqli_real_escape_string($connection,$_REQUEST['gender']);
@$age= mysqli_real_escape_string($connection,$_REQUEST['age']);
@$dob=  mysqli_real_escape_string($connection,$_REQUEST['dob']);
@$residence=  mysqli_real_escape_string($connection,$_REQUEST['residence']);
@$mobile=  mysqli_real_escape_string($connection,$_REQUEST['edit_mobile']);
@$kinsphone=  mysqli_real_escape_string($connection,$_REQUEST['kinsphone']);
@$nationalid=  mysqli_real_escape_string($connection,$_REQUEST['nationalid']);
@$birthcert=  mysqli_real_escape_string($connection,$_REQUEST['birthcert']);
@$cardnumber=  mysqli_real_escape_string($connection,$_REQUEST['cardnumber']);
@$id=  mysqli_real_escape_string($connection,$_POST['patients_id']);

mysqli_query($connection,"UPDATE patients SET  name='$name', dob='$dob', age='$age',Gender='$gender', Residential='$residence', 
     Phone='$mobile', PhoneOfKin='$kinsphone', NationalId='$nationalid',BirthCertNo='$birthcert', CardNumber='$cardnumber' WHERE CardNumber='$id'");

?>