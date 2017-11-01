<!doctype html>
<html>
<head>
	<title> admin add staff</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
			 <link rel="stylesheet" href="testing.css">
			
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#fffaf0;">
 
 <?php include 'header.php'?>
  <?php include  'addadminsprocess.php'?>

    
<div class="row">
     <div class="col-md-3 col-sm-3">
	    </div>
             <div class=" col-sm-6 col-md-6">
			 <form role="form" name="user" method="post" action="add_admins.php" autocomplete="off">
			     <div id="lee">
                       <div class="form-group">
					   
					    <?=$error?>
						<?php if (isset($_POST['submit']) && $error == '') { // if there is no error, then process further
				echo"<p class='alert alert-success'>Form has been submitted successfully.</p>"; // showing success message
				}
				?>
					     <h3 id="p_details">Admin Details</h3> <br />
				             <label for="name"> Full Name</label><br />
                 <input type="text" name="fullName" id="name" class="form-control input-lg" placeholder="Full name" value="<?=@$name ?>" tabindex="1" required autofocus/>
         
		       <br />
			    
				 


		 
		 
		       <label for="mobile">Mobile Number</label><br />
                 <input type="tel" name="mobile" id="mobile" class="form-control input-lg" placeholder="mobile number" value="<?=@$mobileNumber ?>" tabindex="1" required/>
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
		   

				   
				   <input type="submit" name="submit" value="Add Admin" class="btn btn-primary btn-block btn-lg" tabindex="5"><br /><br />
		   
				</div></div>
				
				
				
				</form>
				 
				</div>
				
				<div class="col-md-3 col-sm-3">
	    </div>
		   </div>
		   <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
		   </body>
		        </html>
						
                 