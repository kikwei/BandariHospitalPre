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
	<h3 class="text-center">	<b><?php
	                           include 'header.php';
                        require_once ('dblogin.php');
                $query="SELECT COUNT(*) FROM consult_ward WHERE WardStatus='unattended'";
                $queryResult=mysqli_query($connection,$query);

                $resultArray=mysqli_fetch_array($queryResult);
                echo $resultArray[0].' Unattended Patients.';
                        ?></b></h3>
	<div class="container">
	  
	    <form action="ward_admit_patient.php" method="get">
		  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for patient..enter a letter in name" title="Type in a name" class="form-control input-md">
		       <br />
			   <br />
		     <table class="table table-hover" id="myTable">
			     <thead>
				    <th></th>
				     <th>Name</th>
					  <th>Gender</th>
					 <th>Next of Kin Phone</th>
					   <th>Card Number</th>
					     <th>Disease</th>
						 
						 <th>Date</th>
				 </thead>
			   <tbody>
			   <?php
			    include 'dblogin.php';
		
					  
					  $sql="SELECT name ,Gender,PhoneOfKin,cardnumber,disease,post_date FROM patients NATURAL JOIN consult_ward WHERE WardStatus='unattended'";
					  $query=mysqli_query($connection,$sql);
                      while($rows=mysqli_fetch_array($query)){

                      echo "<tr><td><input type='checkbox' value='$rows[3]' name='patients_id'><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td></tr>";
				  }
				  
				  
			   ?>
              </tbody>			   
			 
		</table>
	<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
		<h3 class='text-center'><button type="submit" class="btn btn-primary">Admit Patient</button> </h3>
		     
</form>
	
	 <h3 class='text-center'><a href="ward_staffhome.php">Back</a></h3>
	</div>
	
	<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
	</body>
</html>	