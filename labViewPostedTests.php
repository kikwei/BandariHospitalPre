<!Doctype html>
<html>
<head>
    <title>Posted Tests</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
   
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>
     <h3 class="text-center">	<b><?php
	                    include 'header.php';
                        require_once ('dblogin.php');
                $query="SELECT COUNT(*) FROM lab WHERE TestsStatus='unattended'";
                $queryResult=mysqli_query($connection,$query);

                $resultArray=mysqli_fetch_array($queryResult);
                echo $resultArray[0].' Unattended Patients.';
                        ?></b></h3>
<div class="container">
  
    <form action="postLabResults.php" method="GET">
        <table border='1' align='center' class='table table-hover text-center' id="myTable">
		    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="type any letter in name.." title="Type in a cardnumber" class="form-control input-md">
            <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Unattended Patients</u></h3></caption>

            <th></th>
			  <th>Name</th>
            <th>Card Number</th>
            <th>Tests</th>
            <th>Tests Date</th>
           

            <?php

            session_start();
            require ('Connection.php');
            if(!isset($_SESSION['lab_login'])){
                header('Location:staff_login.php');
            }

               $connection=mysqli_connect('localhost','root','','bandari2');
            $query="SELECT name,cardnumber,tests,test_date FROM patients NATURAL JOIN lab WHERE TestsStatus='unattended'";

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
        <h3 class='text-center'><button type="submit" class="btn btn-primary">Post Results</button> </h3>
    </form>


    <h3 class='text-center'><a href='lab_staffhome.php'>Back</a></h3>





</div>


         <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script> 

</body>
</html>