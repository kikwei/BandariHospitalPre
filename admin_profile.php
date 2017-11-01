<?php
ob_start();
session_start();
require('dbsettings.php');

$username=$_SESSION['user_login'];
include'authorize.php';
$userquery= "select * from admin where USERNAME='$username'";
$userquery=$sp->query($userquery) or die($sp->error);
$info=$userquery->fetch_object();
?>  
<?php
require('dblogin.php');
$username=$_SESSION['user_login'];
$sql="SELECT * FROM admin WHERE USERNAME='$username'";
$result=  mysqli_query($connection,$sql) or die(mysqli_error($connection));
$rws=mysqli_fetch_array($result);
?>
<!doctype html>
    <html>
	      <head>
		  <meta charset="UTF-8">
		  <title> profile</title>
		  <link  href="css/bootstrap.min.css" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, init-scale=1">
		  </head>
	
	                 <body>
					 
					 <div class="container-fluid">
					       <div class="row-fluid">
						        <div class="col-md-2"></div>
								<div class="col-md-8">
								<br />
								<br />
								<br />
								<div class="panel panel-primary">
								<div class="panel-heading">
								<h3 class="panel-title">Profile</h3>
								</div>
						<div class="panel-body">
						<div class="row">
                <div class="col-md-4">
				<img src="profileimage/<?php echo $info->image; ?>" width="120" height="120" class="round-img" alt="User Image"/><br /><br />
					</div>
					</div>
					<div class="row">
				<div class="col-md-2"style="background-color:#ff00ff">
				<h4 ><a href="change_adminimage.php">Change Pic</a></h4>
				</div>
			</div>
				
					<hr />	
        <div class="row">
                <div class="col-md-4">		
				<p style="color:#1e90ff"> NAME :</p>
				   </div>
				       <div class="col-md-8">	
					    <?php echo "$rws[1]";?> <br />
						
					</div>	
					</div>
					<hr />
					<div class="row">
                <div class="col-md-4">	
			<p style="color:#1e90ff"> NATIONAL ID:</p>
			</div>
			    <div class="col-md-8">
					 <?php echo "$rws[2]";?> <br />
					 </div></div>
					 <hr />
			<div class="row">
                <div class="col-md-4">
			<p style="color:#1e90ff">PHONE:</p>
			
			    </div>
				<div class="col-md-8">
			     <?php echo "$rws[3]";?> <br />
				 </div>
				 </div>
				 <hr />
				 <div class="row">
                <div class="col-md-4">
					 <p style="color:#1e90ff"> EMAIL:</p>
					 </div>
					 <div class="col-md-8">
					   <?php echo "$rws[4]";?> <br /><br />
					 </div>
					 
					  </div>
					  <hr />
					 <!-- <h5><a href="#">Edit profile</a></h5><br /> -->
					  <h5><a href="admin_homepage.php">Back</a></h5>
		 </div>			  
		 </div>			  
					  <div class="col-md-2"></div>
					  </div>
					  </div>
					 <?php
$userquery->close();
?>
					 <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script> 
					 </body>
	
	
	</html>