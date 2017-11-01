<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
<h3 class="text-center"><b><?php
                              include 'header.php';
                        require_once ('dblogin.php');
                $query="SELECT COUNT(*) FROM `lab` WHERE `TestsStatus`='attended' AND `ResultsStatus`='not received'";
                $queryResult=mysqli_query($connection,$query);

                $resultArray=mysqli_fetch_array($queryResult);
                echo $resultArray[0].' Posted Lab Results.';
                        ?></b></h3>
<div class="container">
    <form action="cons_attendpatient.php" method="GET">
	
	      <br /><br />
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="enter patient's cardnumber." title="Type in a name" class="form-control input-md">
    <table class="table table-hover text-center" border="1" id="myTable">
        <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Laboratory Results</u></h3></caption>
		
        <th class="text-center"></th>
		<th class="text-center">Name</th>
        <th class="text-center">Card Number</th>
        <th class="text-center">Tests</th>
        <th class="text-center">Tests Date</th>
        <th class="text-center">Results</th>
        <th class="text-center">Results Date</th>

        <?php
        require('Connection.php');
        session_start();

        if(!isset($_SESSION['cons_login']))
            header('Location:staff_login.php');
//        if(isset($_POST['viewResults']))
//        {
//            $patientsId=$_POST['patientId'];

            $query="SELECT name,cardnumber,tests,test_date,results,results_date FROM patients NATURAL JOIN lab   WHERE ResultsStatus='not received' AND TestsStatus='attended'";

            $result=mysqli_query($connection,$query);

            while($rows=mysqli_fetch_array($result))
            {
                echo"<tr><td><input type='checkbox' value='$rows[1]' name='patients_id'> </td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td></tr>";
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
    td = tr[i].getElementsByTagName("td")[2];
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
        <h3 class='text-center'><button type="submit" class="btn btn-primary">Attend Patient</button> </h3>
    </form>

   <h3 class='text-center'><a href='consultation_staffhome.php'>Back</a></h3>



</div>

</body>
</html>
