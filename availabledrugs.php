<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
    <form action="" method="GET">
	
	      <br /><br />
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="enter drugs name." title="Type in a name" class="form-control input-md">
    <table class="table table-hover text-center" border="1" id="myTable">
        <caption align='center' style='color:#2E4372'><h3 class="text-center"><u>Available Drugs</u></h3></caption>
		
        
		<th class="text-center">Drugname</th>
        <th class="text-center">Available Amount</th>
      
        
        <?php
        require('Connection.php');
        session_start();

        if(!isset($_SESSION['pharm_login']))
            header('Location:staff_login.php');

            $query="SELECT drugname,Quantity,units FROM drugs";

            $result=mysqli_query($connection,$query);

            while($rows=mysqli_fetch_array($result))
            {
                echo"<tr><td>$rows[0]</td><td>$rows[1]     $rows[2]</td></tr>";
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

   <h3 class='text-center'><a href='drugmanagement.php'>Back</a></h3>



</div>

</body>
</html>
