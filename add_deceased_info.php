
<?php
session_start();

include 'dblogin.php';
if(!isset($_SESSION['mort_login'])) 
   header('location:staff_login.php');
?>
<!doctype html>
<html>
<head>
	<title>deceased information</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
			 <link rel="stylesheet" href="testing.css">
			
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#fff;">
 
<?php include 'header.php'; ?> 
 
<br />
<br />
    
<div class="row">
     <div class="col-md-3 col-sm-3">
	    </div>
             <div class=" col-sm-6 col-md-6">
			 
			 
		<div class="panel panel-primary">
		    <div class="panel-heading">
			    <h3 class="panel-title">Deceased  Details</h3>
			</div>
			
			<?php 
			include 'add_deceasedprocess.php';
			$error = ""; // Initialize error as blank
			if (isset($_POST['submit']) && $error == '') { // if there is no error, then process further
				echo"<p class='alert alert-success'>Form has been submitted successfully.</p>";  //showing success message
				}
				?>
<div class="panel-body">			
			 
			 <form role="form" name="user" method="post" action="" autocomplete="off">
			     <div id="lee">
                       <div class="form-group">
					   
				
					    
				    <label for="fullname" >Name</label><br />
                 <input type="text" name="fullName" id="fullName" class="form-control input-lg" placeholder="Full name" value="<?=@$name?>" required/>
         
		       <br />
			      
				    <label for="cardnumber" >Card Number</label><br />
                 <input type="text" name="cardnumber" id="cardnumber" class="form-control input-lg" placeholder="Card Number" value="<?=@$cardnumber?>" required/>
         
		       <br />
			   
			   <label for ="gender"> Gender </label> <br />
			        <select name="gender" class="form-control">
					    <option>Male</option>
						<option>Female</option>
			    </select>
			<br />
				
				<label for="id">National Id</label><br />
                 <input type="text" name="nationalId" id="nationalid" class="form-control input-lg" placeholder="National Id" value="<?=@$nationalId ?>" />
         <br />
		 
		 
		     <label for="birthcert">Birth Certificate Number</label><br />
                 <input type="text" name="birthcert" id="birthcert" class="form-control input-lg" placeholder="Birth Certificate Number" value="<?=@$birthcert?>" />
         <br >

				
		   
			    
                 <label for="dob" >Date Of Birth</label><br />
                 <input type="text" name="dob" id="dob" class="form-control input-lg" placeholder="dd/mm/yyyy" value="<?=@$dob?>"/>
         
		       <br />
			   
                 <label for="dob" >Date Of Death</label><br />
                 <input type="text" name="dod" id="dod" class="form-control input-lg" placeholder="dd/mm/yyyy" value="<?=@$dod?>" required/>
         
		       <br />
				
				 <label for="age" >Age</label><br />
                 <input type="text" name="age" id="age" class="form-control input-lg" placeholder="Age" value="<?=@$age?>" required/>
         
		       <br />
		 

				
				   
				   <input type="submit" name="submit" value="Admit Deceased" class="btn btn-primary btn-block btn-lg"><br />
		   
				</div></div>
				
				<h3><a href="mortuary.php">Back</a></h3>
				
				</form>
				</div>
				</div>
				
				</div>
				
				<div class="col-md-3 col-sm-3">
	    </div>
		   </div>
		   <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
		   </body>
		        </html>
						
                 