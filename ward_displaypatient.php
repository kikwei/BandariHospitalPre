<?php
session_start();
if(!isset($_SESSION['ward_login']))
	header('Location:staff_login.php');

?>


<!doctype html>
  <html>
 

<head>
	<title>Ward Display patient</title>
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
					 <th>Next of Kin Phone</th>
					   <th>Card Number</th>
					     <th>Disease</th>
						 <th>Explanation</th>
						 <th>Date</th>
				 </thead>
			   <tbody>
			   <?php
			    include 'dblogin.php';
			      if(isset($_POST['search'])){
					  
					  $searchid=$_POST['searchId'];
					  $error="";
					  $query = "SELECT * FROM consult_ward WHERE cardnumber='$searchid'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==0){
				$error .= '<p class="alert alert-danger">Patient admission requests are not available</p>';
				}
				else{
					  
					  $sql="SELECT name ,PhoneOfKin,cardnumber,disease,explanation,post_date FROM patients NATURAL JOIN consult_ward WHERE cardnumber='$searchid'";
					  $query=mysql_query($sql);
                      while($rows=mysql_fetch_array($query)){

                      echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td></tr>";
				  }
				  }
				  }
			   ?>
              </tbody>			   
			 
		</table>
		<?=$error ?>
		
		     
</form>
	
	 <h3><a href="ward_staffhome.php">Back</a></h3>
	</div>
	
	<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
	</body>
</html>	