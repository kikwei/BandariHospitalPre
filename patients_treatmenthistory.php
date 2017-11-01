
<!doctype html>
<html>
     <head>
	 <title>Patients treatment history</title>
	 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	 </head>
	 <body>
	 <?php include 'header.php'?>
	 
	 <div class="container-fluid">
	     <div class="row">
		     <div class="col-md-12">
<?php
session_start();

include 'dblogin.php';

if(!isset($_SESSION['cons_login'])) 
    header('location:staff_login.php');
 ?>

	        <?php if(!isset($_SESSION['patients_id'])) 
    echo "no session";?>

            <?php

           if(isset($_SESSION['patients_id'])){
			   $id= $_SESSION['patients_id'];
			   $date=$_GET['TreatmentDate'];
            
               $connection=mysqli_connect('localhost','root','','bandari');
            $query= "SELECT name ,cardnumber, symptoms ,disease,prescribed_drugs,TreatmentDate FROM patients NATURAL JOIN patients_disease_record WHERE  cardnumber= '$id' AND TreatmentDate='$date'";

            $queryResult=mysqli_query($connection,$query);
            $rows=mysqli_affected_rows($connection);
			
			if($rows >0){
				?>
				<h3 align="center"><b> <u><caption>Patient's  Records </u> </caption></b></h3>
         <table border='1' align='center' class='table table-hover text-center'>
		     <thead>
			 <th>Name</th>
			 <th>Card Number</th>
			 <th>Symptoms</th>
            <th>Disease</th>
			<th>Prescribed Drugs</th>
            <th>Treatment Date</th>
			</thead>
			<tbody>
			<?php

            while($rows=mysqli_fetch_array($queryResult)){

                echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td></tr>";




            } ?>
			</tbody>
		
			</table>
				<?php
			}
			else {
				echo "<p class='alert alert-danger'>No patient's Previous Treatment Records found</p>";
			}
		   }
            ?>
</div>
</div>
</div>
    <div class="container-fluid">
	     <div class="row">
		     <div class="col-md-12">
 <?php

           if(isset($_SESSION['patients_id'])){
			   $id= $_SESSION['patients_id'];
            
               $connection=mysqli_connect('localhost','root','','bandari');
            $query= "SELECT tests ,test_date, results ,results_date FROM lab WHERE  cardnumber= '$id' AND results_date='$date'";

            $queryResult=mysqli_query($connection,$query);
            $rows=mysqli_affected_rows($connection);
			
			if($rows >0){
				?>
				<h3 align="center"><b> <u><caption>Patient's  Lab Records </u> </caption></b></h3>
         <table border='1' align='center' class='table table-hover text-center'>
		     <thead>
			 <th>Test</th>
			 <th>Test Date</th>
			 <th>Results</th>
            <th>Results Date</th>
            
			</thead>
			<tbody>
			<?php

            while($rows=mysqli_fetch_array($queryResult)){

                echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td></tr>";




            } ?>
			</tbody>
		
			</table>
				<?php
			}
			else {
				echo "<p class='alert alert-danger'>No patient's Previous Laboratory Records found</p>";
			}
		   }
            ?>
</div>
</div>
</div>



</body>
</html>