
<?php
session_start();

include 'dblogin.php';

if(!isset($_SESSION['cons_login'])) 
   header('location:staff_login.php');


?>

<?php 
         
			 $error = ""; // Initialize error as blank
			$salt="@g26jQsG&nh*&#8v";
            @$oldpassword= sha1($_REQUEST['oldpass'].$salt);

			@$newpassword= sha1($_REQUEST['newpass'].$salt);
				
			@$confirmpassword=sha1($_REQUEST['confirmpass'].$salt);
			
			@$username= $_SESSION['cons_login'];
			 
         
            if(isset($_REQUEST['submit'])){
            $sql="SELECT * FROM staff WHERE USERNAME='$username'";
            $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
			$rws=array();
            $rws=  mysqli_fetch_array($result);
			
	if($rws[8]==$oldpassword && $newpassword==$confirmpassword)
	{
                $sql1="UPDATE staff SET PASSWORD ='$newpassword' WHERE USERNAME='$username'";
				mysqli_query($connection,$sql1);
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
?>

<!doctype html>
     <html>
	 
	        <head>
			    <title>Change password</title>
			<meta name="viewport" content="width=device-width, init-scale=1">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			  
			
			</head>
			
			<body>
			<?php include 'header.php'; ?>
			
			
	<div class="container-fluid">
		<div class="row-fluid">
		       <div class="col-md-3"></div>
		             <div class="col-md-6">
					 <br />
		<div class="panel panel-primary">
		    <div class="panel panel-heading">
			 <h3 class="panel-title">Change Password</h3>
			 </div>
			 <div class="panel-body">
		       <form  method="post" action="">
		       <div class="form-group">
		   <?=$error ?>
		          <br />
		      <label for "oldpass">Old Password</label>
<input type="password" name="oldpass" id="oldpass" class="form-control input-lg" placeholder="old password" value="<?=@$oldpass?>" required/>
	        
	           <br />
            
         <label for "newpass">New Password</label>
	<input type="password" name="newpass" id="newpass" class="form-control input-lg" placeholder="new password" value="<?=@$newpass?>" required/>
	                             
            
			  <br />
	<label for "oldpass">Confirm New Password</label>
		<input type="password" name="confirmpass" id="confirmpass" class="form-control input-lg" placeholder="confirm password" value="<?=@$confirmpass?>" required/>
	        <br />
				   
                                  <input type="submit" name="submit" value="changepassword" class="btn btn-primary btn-block btn-lg" ><br />
                     </div>
	</form>
					   
					   
					  
			<br />
					   </div>
					    </div>
						</div>
		  
		
<div class="col-md-3"></div>		 
             		</div>
					</div>
			
			</body>
	 
	 
	 </html>
	  