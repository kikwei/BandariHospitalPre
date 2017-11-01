<?php
session_start();
if(!isset($_SESSION['cons_login']))
	header('Location:staff_login.php');

?>


<!doctype html>
  <html>
  <style>
            .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
}
#button{
    border:none;
}
</style>
<head>
	<title>Lab view tests</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

    <body>
	
	<div class="container">
	    <form action="" method="post">
		       <br />
			   <br />
		     <table class="table table-hover">
			     <thead>
				     <th>Name</th>
					   <th>Card Number</th>
					     <th>Lab Results</th>
						 <th>Date</th>
				 </thead>
			   <tbody>
			   <?php
			    include 'dblogin.php';
			      if(isset($_POST['search'])){
					  
					  $searchid=$_POST['searchId'];
					  
					  
					   $error="";

			$query = "SELECT * FROM labresults WHERE cardnumber='".$_POST['searchId']."'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==0){
				$error .= '<p class="alert alert-danger">Patient lab results not available </p>';
				}
				  
				 else if(isset($_POST['search'])){
		

			$query = "SELECT * FROM patients WHERE CardNumber='".$_POST['searchId']."'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==0){
				$error .= '<p class="alert alert-danger">Patient not registered </p>';
				}
				
				else{
					  $sql="SELECT name ,cardnumber,results,results_date FROM patients NATURAL JOIN labresults WHERE cardnumber='$searchid'";
					  $query=mysql_query($sql);
                      while($rows=mysql_fetch_array($query)){

                      echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td></tr>";
				  }
				  }
				  }
				  }
			   ?>
              </tbody>			   
			 
		</table>
		<?=$error?>
		     
</form>
	
	 <h3><a href="consultation_staffhome.php">Back</a></h3>
	</div>
	
	<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
	</body>
</html>	