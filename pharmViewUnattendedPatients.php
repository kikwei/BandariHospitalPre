<!Doctype html>
<html>
<head>
    <title>Unattended Patients</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
      <h3 class="text-center">	<b><?php
	                         include 'header.php';
                        require_once ('dblogin.php');
                $query="SELECT COUNT(*) FROM consultpharm WHERE PharmStatus='unattended'";
                $queryResult=mysqli_query($connection,$query);

                $resultArray=mysqli_fetch_array($queryResult);
                echo $resultArray[0].' Unattended Patients.';
                        ?></b></h3>
<div class="container">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for patient.." title="Type in a name" class="form-control input-md">
    <form action="drugamount.php" method="GET">
        <table border='1' align='center' class='table table-hover text-center' id="myTable">
            <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Unattended Patients</u></h3></caption>

            <th></th>
           <th>Name</th>
            <th>Card Number</th>
            <th>Drugs</th>
            <th>Post Date</th>
            
            <?php

            session_start();
            require ('Connection.php');
            if(!isset($_SESSION['pharm_login'])){
                header('Location:staff_login.php');
            }


            $query="SELECT name,cardnumber,Drug,Post_date FROM patients NATURAL JOIN consultpharm WHERE PharmStatus='unattended'";

            $queryResult=mysqli_query($connection,$query);



            while($rows=mysqli_fetch_array($queryResult)){

                echo "<tr><td><input type='radio' value='$rows[1]' name='patients_id'> </td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td></tr>";




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
        <button  type="submit"    class="btn btn-primary btn-md">Attend Patient</button> 
    </form>


    <h3 class='text-center'><a href='pharmacy_staffhomepage.php'>Back</a></h3>





</div>



</body>
</html>