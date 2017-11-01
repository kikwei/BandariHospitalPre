
<?php
session_start();

include 'dblogin.php';

if(!isset($_SESSION['ward_login'])) 
    header('location:staff_login.php');
?>
<!doctype html>
<html>
<head>
	<title> register patient</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
			 <link rel="stylesheet" href="testing.css">
			
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#fff;">
 

  <?php include  'ward_admit_patientprocess.php'?>
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
			<?php if (isset($_POST['submit']) && $error == '') { // if there is no error, then process further
				echo"<p class='alert alert-success'>Patient Admitted successfully.</p>"; // showing success message
				}
				?>
<div class="panel-body">			
			 
			 <form role="form" name="user" method="post" action="" autocomplete="off">
			     <div id="lee">
                       <div class="form-group">
					   
				
					
		
			   
			   <label for ="ward"> Ward Type </label> <br />
			        <select name="ward" class="form-control">
					    <option>Maternity</option>
						<option>Childrens</option>
						<option>ICU</option>
						<option>Male Ward</option>
						<option>Female Ward</option>
						<option>Special Cases Ward</option>
			    </select>
			<br />
				
			    
                 <label for="room" >Room Number</label><br />
                 <input type="text" name="room" id="room" class="form-control input-lg" placeholder="Room Number" value="<?=@$room?>" required/>
         
		       <br />

				   
				   <input type="submit" name="submit" value="Admit Patient" class="btn btn-primary btn-block btn-lg"><br />
		   
				</div></div>
				
				<h3><a href="ward_staffhome.php">Back</a></h3>
				
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
						
                 