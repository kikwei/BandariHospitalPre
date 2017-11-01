 
 <?php
include'dblogin.php';
session_start();
 if(!isset($_SESSION['user_login']))
	 header('Location:admin_login.php')
 ?>
 <html>
	    <head>
		<title>disease count</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="jquery-ui/jquery-ui.css" rel="stylesheet">
     <script src="js/jquery.min.js"></script>
     <script src="jquery-ui/jquery-ui.js"></script>
	  <script src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, init-scale=1">
		</head>
		
		
		
		<body>
	<?php include 'header.php' ?>	
		
	<div class="container-fluid">
		   <div class="row-fluid">
		       <div class="col-md-4"></div>
			   
		<div class="col-md-4">
				    <script>
         $(function() {
            $( "#datepicker-10" ).datepicker({
               changeMonth:true,
               changeYear:true,
               numberOfMonths:[1,1],
			   dateFormat:"yy-mm-dd"
            });
         });
      </script>
	  <script>
	  $(function() {
            $( "#datepicker-11" ).datepicker({
				
               changeMonth:true,
               changeYear:true,
			   
               numberOfMonths:[1,1],
			   dateFormat:"yy-mm-dd"
			    
            });
         });
      </script>
	   <h4 class="text-center"><u><b>Enter Date range </b></u></h4>
<form action="track_diseaseprocess.php" method="post">
		
		<div class="form-group">
		    <br />
			<br />
	
		
		
		<label for="startdate">Start Date</label>
		<input type="text" name ="startdate" class="form-control" id="datepicker-10" placeholder="yyyy-mm-dd"> <br />
		
		
		<label for="enddate">End Date</label>
		<input type="text" name ="enddate" class="form-control" id="datepicker-11" placeholder="yyyy-mm-dd"> <br />
		<input type="submit" name="submit" value="submit" class="btn btn-primary btn-lg">
		
</div>
	</form>
		<h3 ><a href="admin_homepage.php">Back</a></h3>
		</div>

<div class="col-md-4"></div>		
		

     

		</body>
		</html>
		
		