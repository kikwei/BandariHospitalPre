
		<!doctype html>
		   <html>
		   
		        <head>
				<title>Discahrge Patient</title>
				</head>
				
			<?php
session_start();

include 'dblogin.php';

if(!isset($_SESSION['ward_login'])) 
    header('location:staff_login.php');
 ?>
 				<?php
		include 'dblogin.php';
		if(isset($_GET['patients_id'])){
			$id=$_GET['patients_id'];
			
		if (isset($_POST['submit'])){
			$id= $_GET['patients_id'];
			$date = date("Y-m-d H:i:s");
			$error="";
			
			mysql_query("UPDATE admitted_patients SET AdmissionStatus='Discharged' , discharge_date='$date' WHERE cardnumber='$id'");
       
				$error .= '<p class="alert alert-success">Patient discharged successfully</p>';
		}
		}
		?>
				 
				<body>
		
				
				    <p>Are you sure you want to discharge patient cardnumber <h3> <?php $id= $_GET['patients_id'];echo"$id"; ?></h3></p>
				     <input type="submit" name="submit" value="Discharge" class="btn btn-primary btn-block btn-lg"><br />
				</body>
		
		      
		   </html>