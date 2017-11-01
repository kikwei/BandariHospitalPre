<!Doctype html>
<html>
<head>
    <title>View patient</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
<?php $error=""; 

?>
	<?=$error?>
  <h3 class="text-center">	<b><?php
                                 include 'header.php';
                        require_once ('dblogin.php');
                $query="SELECT COUNT(*) FROM admitted_patients WHERE AdmissionStatus='admitted'";
                $queryResult=mysqli_query($connection,$query);

                $resultArray=mysqli_fetch_array($queryResult);
                echo $resultArray[0].' Admitted Patients.';
                        ?></b></h3>
<div class="container">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for patient..enter a letter in name" title="Type in a name" class="form-control input-md">
    <form  action="" method="post">
     <div class="form-group">
    <table  class="table table-hover" id="myTable">

        <caption align='center' style='color:#2E4372'><h3><u>Patient's Details</u></h3></caption>
           <th></th>
        <th> Name</th>
        <th>Gender</th>
        <th>Residence</th>
        
        <th>Phone Of Kin</th>
        <th>Card Number</th>
        <th>Ward</th>
        <th>Room</th>
       
       
        
        <?php

        session_start();
        require ('dblogin.php');
        if(!isset($_SESSION['ward_login'])){
            header('Location:staff_login.php');
        }
     


            $search="SELECT Name, Gender, Residential ,PhoneOfKin,cardnumber,Ward,room FROM admitted_patients NATURAL JOIN patients WHERE AdmissionStatus= 'admitted'";

            $query=mysqli_query($connection,$search);
            while($rows=mysqli_fetch_array($query)){


                echo "<tr><td><input type='checkbox' name='patients_id' value='$rows[4]'</td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td><td>$rows[6]</td></tr>";
            }

        
		
        ?>
		
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
   <?php
                        require'Connection.php';
                       @$id=  mysqli_real_escape_string($connection,$_POST['patients_id']);
                       if(isset($_POST['discharge'])){
                        $updateQuery="UPDATE admitted_patients SET AdmissionStatus='discharged' WHERE cardnumber='".$_POST['patients_id']."'";
						mysqli_query($connection,$updateQuery);
                           echo"<p class='alert alert-success'>Patient succesfully discharged</p>";
                          }
						  
                        ?>

      <input type="submit" name="discharge" value="Discharge" class="btn btn-primary "> 
            
        </div>
    </form>
	 <h3 class='text-center'><a href="ward_staffhome.php">Back </h3>
</div>

</body>
</html>