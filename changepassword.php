
<?php
session_start();

include 'dblogin.php';

if(!isset($_SESSION['user_login'])) 
    header('location:admin_login.php');

?>
<?php include 'changepasswordprocess.php' ?>
<?php include 'header.php' ?>

<!doctype html>
     <html>
	 
	        <head>
			    <title>Change password</title>
			<meta name="viewport" content="width=device-width, init-scale=1">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			  
			
			</head>
			
			<body>
			
			
			
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
					   
					   
					<h3 ><a href="admin_homepage.php">Back</a></h3>   
			<br />
					   </div>
					    </div>
						</div>
		  
		
<div class="col-md-3"></div>		 
             		</div>
					</div>
			
			</body>
	 
	 
	 </html>
