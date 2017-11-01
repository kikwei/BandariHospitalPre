<?php
session_start();

include 'dblogin.php';

if(!isset($_SESSION['user_login'])) 
    header('location:admin_login.php');

?>

<!doctype html>
<html>
<head>
	<title> admin add staff</title>
	        
		    <link rel="stylesheet" type="text/css" href="bandaricss.css">
		    <script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	        <link  href="css/bootstrap.min.css" rel="stylesheet">
			<link rel="stylesheet" href="testing.css">
			<link rel="stylesheet" href="css/css/screen.css">
	        <script src="css/lib/jquery.js"></script>
	        <script src="css/dist/jquery.validate.js"></script>
            <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#fff;">

<script type="text/javascript">
$(document).ready(function() {
$("body").on
("contextmenu", function(e){
return false;
});
$('body').bind('cut copy paste',function(e){
	e.preventDefault();
});
});
</script>

<script>

	$().ready(function() {
		
		$("#signupForm").validate({
			rules: {
				
				fullName: {
			  
				required:true,	
				minlength:3
				},
				username: {
					required: true,
					minlength: 5
				},
				password: {
					required: true,
					minlength: 5
				},
			
				email: {
					required: true,
					email: true
				},
				mobile:{
					required:true,
				
					minlength:10
				},
				
				nationalId:{
					required:true,
					minlength:8
				},
			},
			messages: {
			
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 5 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
			   
				email:{
					required:"Please enter an email address",
			},
			nationalId:{
		    required:"please enter a national id",
            minlength:"National Id should be atleast 8 characters"
			}
			}
		});
	});
</script>

 <style>
     #signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}
	
	</style>
    <?php include 'header.php'?>
    <?php include  'addStaff.php'?>

<div class="row">
     <div class="col-md-3">
	    </div>
             <div class="col-md-6">
			      <div class="panel panel-default">
				      <div class="panel-body">
					  
			 <h4 class="text-center"><u><b>Add Staff </b></u></h4>
			 <form role="form" name="user"  id="signupForm" method="post" action="add_staff.php" autocomplete="off">
			     <div id="lee">
                       <div class="form-group">
					   
					         <?=$error?>
						    <?php if (isset($_POST['submit']) && $error == '') { 
						
				             echo"<p class='alert alert-success'>staff succesfully registered.</p>"; 
				}
				?>
				   
			<label for="fullname" >Full Name</label><br />
                 <input type="text" name="fullName" id="name" class="form-control input-lg" placeholder="Full name" 
				 
				       value="<?=@$name?>" required/>
				 
                        <br />
				         <label for="pfnumber" >PF Number</label><br />
                    <input type="text" name="pfnumber" id="pfnumber" class="form-control input-lg" placeholder="PF Number" value="<?=@$pfnumber?>" required/>
		       <br />
			    
				 <label for="department">Department</label><br /> 
				 
				     <select name="department" class="form-control">
					     <option>RECEPTION </option>
						 <option>CONSULTATION</option>
						 <option>LABORATORY</option>
						 <option>WARD</option>
						 <option>PHARMACY</option>
						 <option>MORTUARY</option>
						 </select><br />
						 
		 <label for="mobile">Mobile Number</label><br />
              <input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="mobile number" value="<?=@$mobileNumber?>"  required/>
         <br >
		<label for="id">National Id</label><br />
            <input type="text" name="nationalId" id="nationalid" class="form-control input-lg" placeholder="National Id" value="<?=@$nationalId ?>" tabindex="1" required/>
         
<br />
		 
		 
		 <label for="email">Email</label><br />
                 <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?=@$email ?>" tabindex="1" required/>
           <br >
		   
		   <label for="username">Username</label><br />
                 <input type="text" name="username" id="username" class="form-control input-lg" placeholder="username"  tabindex="1" required/>
           
		   <br />

                           <label for="password">Password</label><br />
                           <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password"  tabindex="1" required/>

                           <br />
		   

				   
				   <input type="submit" name="submit" value="Add Staff" class="btn btn-primary btn-block btn-lg"><br />
		   
				</div></div></div></div>
				
				<h3><a href="admin_homepage.php">Back</a></h3>
				
				</form>
				</div>
			
				
				
				
				<div class="col-md-3">
	    </div>
		   </div>
		
		   </body>
		        </html>
						
                 