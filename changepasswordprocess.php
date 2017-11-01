 <?php 
         
			 $error = ""; 
			$salt="@g26jQsG&nh*&#8v";
            @$oldpassword=  sha1($_REQUEST['oldpass'].$salt);

			@$newpassword=  sha1($_REQUEST['newpass'].$salt);
				
			@$confirmpassword=  sha1($_REQUEST['confirmpass'].$salt);
			
            $username=$_SESSION['user_login'];
            if(isset($_REQUEST['submit'])){
				
            $sql="SELECT * FROM admin WHERE USERNAME='$username'";
            $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
            $rws=  mysqli_fetch_array($result);
			
	if($rws[7]==$oldpassword && $newpassword==$confirmpassword)
	{
                $sql1="UPDATE admin SET PASSWORD ='$newpassword' WHERE USERNAME='".$_SESSION['user_login']."'";
				mysqli_query($connection,$sql1);
				
	} 
		
			else{
				$error .='<p class="alert alert-danger">wrong old password. </p>';
			}	
            
	
if ($newpassword != $confirmpassword) {
	
	$error.='<p class="alert alert-danger">new password and confirm password do not match.</p>';

}


if (isset($_POST['submit']) && $error=='') 
			 { 
				$error.= '<p class="alert alert-success">Password changed successfully.</p>'; 
          }	
			}