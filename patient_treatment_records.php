<!Doctype html>
<html>
<head>
    <title>Treatment Records</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
      <h3 class="text-center">	<b><?php
	                          include 'header.php';
                        require_once ('dblogin.php');
                $query="SELECT COUNT(*) FROM patients_disease_record";
                $queryResult=mysql_query($query);

                $resultArray=mysql_fetch_array($queryResult);
                echo $resultArray[0].' Patient Treatment Records.';
                        ?></b></h3>
<div class="container">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for patient..enter a letter in name.." title="Type in a name" class="form-control input-md">
    <form action="" method="GET">
        <table border='1' align='center' class='table table-hover text-center' id="myTable">
            <caption align='center' style='color:#2E4372'><h3 class="text-center"><u> <b>Patients' Treatment Records</b></u></h3></caption>

            <th>Name</th>
           <th>Gender</th>
            <th>Card Number</th>
            <th>Disease</th>
            <th>Treatment Date</th>
            
            <?php

            session_start();
            require ('Connection.php');
            if(!isset($_SESSION['cons_login'])){
                header('Location:staff_login.php');
            }


            $query="SELECT name,Gender,cardnumber,disease,TreatmentDate FROM patients NATURAL JOIN patients_disease_record";

            $queryResult=mysqli_query($connection,$query);



            while($rows=mysqli_fetch_array($queryResult)){

                echo "<tr><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td></tr>";




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
    td = tr[i].getElementsByTagName("td")[0];
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
        
    </form>

 
    <h3 class='text-center'><a href='consultation_staffhome.php'>Back</a></h3>





</div>



</body>
</html>