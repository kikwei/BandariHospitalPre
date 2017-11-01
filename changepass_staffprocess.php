 <?php 
         
			 $error = ""; // Initialize error as blank
			$salt="@g26jQsG&nh*&#8v";
            @$oldpassword= sha1($_REQUEST['oldpass'].$salt);

			@$newpassword= sha1($_REQUEST['newpass'].$salt);
				
			@$confirmpassword=sha1($_REQUEST['confirmpass'].$salt);
			
			@$username= $_SESSION['user_login'];
			 
         
            if(isset($_REQUEST['submit'])){
            $sql="SELECT * FROM staff WHERE USERNAME='$username'";
            $result=mysql_query($sql) or die(mysql_error());
			$rws=array();
            $rws=  mysql_fetch_array($result);
			
	if($rws[6]==$oldpassword && $newpassword==$confirmpassword)
	{
                $sql1="UPDATE staff SET PASSWORD ='$newpassword' WHERE USERNAME='$username'";
				mysql_query($sql1);
				// if(mysql_affected_rows($connection)>0)
				// {
					// echo "good";
				 //}
				
	} 
		
			else{
				$error .='<p class="alert alert-danger">wrong old password. </p>';
			}	
            
	
if ($newpassword != $confirmpassword) {
	
	$error.='<p class="alert alert-danger">new password and confirm password do not match.</p>';

}


if (isset($_POST['submit']) && $error=='') // if there is no error, then process further
			 { 
				$error.= '<p class="alert alert-success">Password changed successfully.</p>'; // showing success message
				
          }	
		 // echo $rws[6];
		 // echo "<br>";
		  
		 // echo $oldpassword;
		 // echo "<br>";
		 // echo "<br>";
		 // echo $newpassword;
		 // echo "<br>";
		 // echo $confirmpassword;
		 // echo "<br>";
		  
			}