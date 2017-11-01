<?php 
session_start();
        
if(!isset($_SESSION['user_login'])) 
   header('location:admin_login.php');   
?>

<?php
include 'dblogin.php';
$sql="SELECT * FROM `staff`";
$result=  mysqli_query($connection,$sql) or die(mysqli_error($connection));
$sql_min="SELECT MIN(nationalid) from staff";
$result_min=  mysqli_query($connection,$sql_min);
$rws_min=  mysqli_fetch_array($result_min);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Staff Details</title>
        <style>
            .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
}
#button{
    border:none;
}
        </style>
      <link  href="css/bootstrap.min.css" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, init-scale=1">
    </head>
	  <?php include 'header.php' ?>
    <body style="background-color:#fff;">
  
     
    <div class="displaystaff_content">
      
                    <div class="displaystaff">
                <form action="edit_staff.php" method="POST">
                 <div class="container">
				  <!--<div class="table-responsive"> -->
				  <!-- test sort display -->
  <br />
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for staff..enter any letter in name" title="Type in a name" class="form-control input-md">

                    <table class="table table-hover" id="myTable" align="center">
                        <caption align='center' style='color:#2E4372'><h3><u>Staff Details</u></h3></caption>
                         <thead>
						 <th></th>
						 
						<th>NAME</th>
						<th>PF NUMBER</th>
                        <th>NATIONAL ID</th>
                        <th>DEPARTMENT</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        </thead>
						<tbody>
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='staff_id' value=".$rws[1];
                            if($rws[0]==$rws_min[0]) echo 'checked';
                            echo " /></td>";
                            echo "<td>".$rws[0]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
							 echo "<td>".$rws[4]."</td>";
                          echo "<td>".$rws[5]."</td>";
                          
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
                    
                        
                            <input type="submit" name="submit1_id" value="EDIT" class="btn btn-primary btn-lg" ><br />
                       
					   <h3><a href="admin_homepage.php">Back</a></h3>
                        </div>
                   
                    </form>
                
             </div>      
</div>

         <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script> 
    </body>
</html>