<?php 
session_start();
        
if(!isset($_SESSION['cons_login'])) 
   header('location:staff_login.php');   
?>

<?php
include 'dblogin.php';
$sql="SELECT * FROM `patients` WHERE Status='unattended'";
$result=  mysqli_query($connection,$sql) or die(mysqli_error($connection));
$sql_min="SELECT MIN(cardnumber) from patients";
$result_min=  mysqli_query($connection,$sql_min);
$rws_min=  mysqli_fetch_array($result_min);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>unattended patients</title>

      <link  href="css/bootstrap.min.css" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, init-scale=1">
	  
    </head>
    
    <?php include 'header.php' ?>
     
    <div class="displaystaff_content">
      
                    <div class="displaystaff">
                <form action="cons_attendpatient.php" method="GET">
                 <div class="container">
				  <!--<div class="table-responsive"> -->
				  <!-- test sort display -->
  <br />
  
  	<h3 class="text-center"><b><?php
                        require_once ('dblogin.php');
                $query="SELECT COUNT(*) FROM `patients` WHERE `Status`='unattended'";
                $queryResult=mysqli_query($connection,$query);

                $resultArray=mysqli_fetch_array($queryResult);
                echo $resultArray[0].' Unattended Patients.';
                        ?></b></h3>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="enter patient's cardnumber" title="Type in a name" class="form-control input-md">

                    <table class="table table-hover" id="myTable" align="center">
                        <caption align='center' style='color:#2E4372'> <h4 class="text-center"><u><b>Patient Details </b></u></h4></caption>
					
                         <thead>
						 <th></th>
						<th>NAME</th>
                        <th>DATE OF BIRTH</th>
						<th>AGE</th>
                        <th>GENDER</th>
                        <th>RESIDENCE</th>
                        <th>PHONE</th>
						<th>PHONE OF KIN</th>
						<th>NATIONAL ID</th>
						<th>BIRTH CERTIFICATE</th>
						<th>CARD NUMBER</th>
						<th>REGISTRATION DATE</th>
                        </thead>
						<tbody>
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='patients_id' value=".$rws[9];
                            if($rws[0]==$rws_min[0]) echo 'checked';
                            echo " /></td>";
                            echo "<td>".$rws[0]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
							 echo "<td>".$rws[4]."</td>";
							 echo "<td>".$rws[5]."</td>";
							 echo "<td>".$rws[6]."</td>";
							 echo "<td>".$rws[7]."</td>";
							 echo "<td>".$rws[8]."</td>";
                             echo "<td>".$rws[9]."</td>";
                             echo "<td>".$rws[10]."</td>";
                          
                            echo "</tr>";
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
    td = tr[i].getElementsByTagName("td")[10];
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
                    
                        
                            <h3 class='text-center'><button type="submit" class="btn btn-primary">Attend Patient</button> </h3><br />
                       
					   <h3><a href="consultation_staffhome.php">Back</a></h3>
                        </div>
                   
                    </form>
                
             </div>      
</div>

         <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script> 
    </body>
</html>