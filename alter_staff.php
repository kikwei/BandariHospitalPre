<?php
if(isset($_POST['submit'])){
@$name=  mysqli_real_escape_string($connection,$_POST['edit_name']);
@$dept=  mysqli_real_escape_string($connection,$_POST['edit_dept']);
@$email=  mysqli_real_escape_string($connection,$_POST['edit_email']);
$pfnumber=mysqli_real_escape_string($connection,$_POST['pfnumber']);
@$mobile=  mysqli_real_escape_string($connection,$_POST['edit_mobile']);
@$id=  mysqli_real_escape_string($connection,$_POST['staff_id']);
@$nationalid= mysqli_real_escape_string($connection,$_POST['edit_id']);
mysqli_query($connection,"UPDATE staff SET nationalid='$nationalid' , name='$name', department='$dept', phone='$mobile', email='$email' WHERE  PFNumber='$pfnumber'");
}
?>