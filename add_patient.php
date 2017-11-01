
<?php
session_start();

include 'dblogin.php';

if(!isset($_SESSION['rec_login'])) 
    header('location:staff_login.php');
?>
<!doctype html>
<html>
<head>
	<title> register patient</title>
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
		
		$("#myForm").validate({
			rules: {
				
				fullName: {
			  
				required:true,	
				minlength:3
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
<?php include  'add_patientprocess.php'?>
<br />
<br />
<div class="row">
     <div class="col-md-3 col-sm-3">
	    </div>
           <div class=" col-sm-6 col-md-6">
		     <div class="panel panel-primary">
		         <div class="panel-heading">
			    <h3 class="panel-title">Patient's  Details</h3>
			</div>
			
			<?=$error?>
			
			<?php if (isset($_POST['submit']) && $error == '') { 
				echo"<p class='alert alert-success'>Form has been submitted successfully.</p>"; 
				}
				?>
				
				
				
<div class="panel-body">			
			 
			 <form role="form" name="user" id="myForm" method="post" action="add_patient.php" autocomplete="off">
			     <div id="lee">
                       <div class="form-group">
					    
				 <label for="fullname" >Full Name</label><br />
                    <input type="text" name="fullName" id="name" class="form-control input-lg" placeholder="Full name" value="<?=@$name?>" required/>
         
		       <br />
			   
			   <label for ="gender"> Gender </label> <br />
			        <select name="gender" class="form-control">
					    <option>Male</option>
						<option>Female</option>
			    </select>
			<br />
				
			    
              <label for="dob" >Date Of Birth</label><br />
                 <input type="text" name="dob" id="dob" class="form-control input-lg" placeholder="Date Of Birth" value="<?=@$dob?>" required/>
         
		       <br />

		  <label for="age" >Age</label><br />
               <input type="text" name="age" id="age" class="form-control input-lg" placeholder="Age" value="<?=@$age?>" required/>
				 <br />
				 
		  <label for="residence">Residence</label><br />
                 <input type="text" name="residence" id="residence" class="form-control input-lg" placeholder="Residence" value="<?=@$residence?>"  required/>
         <br >

				
		 
		     <label for="mobile">Mobile Number</label><br />
                 <input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="mobile number" value="<?=@$mobileNumber?>"  required/>
         <br >

			 <label for="phoneofkin">Next Of Kin Phone</label><br />
                 <input type="text" name="phoneofkin" id="phoneofkin" class="form-control input-lg" placeholder="mobile number of next of kin" value="<?=@$phoneofkin?>"  required/>
         <br >

				
				
				<label for="id">National Id</label><br />
                 <input type="text" name="nationalId" id="nationalid" class="form-control input-lg" placeholder="National Id" value="<?=@$nationalId ?>" tabindex="1"/>
         <br />
		 
		 
		     <label for="birthcert">Birth Certificate Number</label><br />
                 <input type="text" name="birthcert" id="birthcert" class="form-control input-lg" placeholder="Birth Certificate Number" value="<?=@$birthcert?>" />
         <br >

				
		   
       <label for="cardnumber">Card Number</label><br />
               <input type="text" name="cardnumber" id="cardnumber" class="form-control input-lg" placeholder="Card Number" value="<?=@$cardnumber?>"  required/>
         <br >

				
				   
				   <input type="submit" name="submit" value="Add Patient" class="btn btn-primary btn-block btn-lg"><br />
		   
				</div></div>
				
				<h3><a href="reception_staffhome.php">Back</a></h3>
				
				</form>
				</div>
				</div>
				
				</div>
				
				<div class="col-md-3 col-sm-3">
	    </div>
		   </div>
		
		   </body>
		        </html>
						
                 