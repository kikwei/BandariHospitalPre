<?php 
session_start();
if(!isset($_SESSION['mort_login']))
	header('Location:staff_login.php');?>
   <!doctype html>
  <html>
<head>
	<title>Mortuary staff Homepage Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#00FFFF;">
<?php include 'header.php' ?>
       
	   <div class="row">
	       <div class="col-md-6">
		      <div id="aside">
			      <h3><u>Staff's Account</u> </h3>
				  
				  <ul>
				  <li><a href="mort_profile.php">Profile </a></li><br />
                   
				  <li><a href="mort_change_pass">Change Password</a></li><br />
				  <li><a href="logoutstaff.php"> Logout </a></li>
				  </ul>
				  
		</div>
		 </div>
   <div class="col-md-6">
       <div id="aside">
           <h3><u>Staff's Home</u></h3>
     <ul>
	         <li><a href="add_deceased_info.php">Admit Deceased</a></li><br />
	         <li><a href="search_deceased.php"> Search Deceased </a></li><br />
			 
	        <li><a href="discharge_deceased.php">Discharge Diseased</a></li><br />
			
			<!-- <li><a href="#">Unknown Diseased Info</a></li><br /> 
			<li><a href="#">Messages</a></li>  -->
	 
	 </ul>	
 

</div>
</div>
</div>
<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
   

</body>
</html>   