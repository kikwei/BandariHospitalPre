<?php 
session_start();
 include 'dblogin.php';      
if(!isset($_SESSION['user_login'])) 
    header('location:admin_login.php');   
?>

<?php
include 'delete_staffprocess.php';
//include 'dblogin.php';
$sql="SELECT * FROM `staff`";
$result=  mysqli_query($connection,$sql) or die(mysql_error($connection));
$sql_min="SELECT MIN(nationalid) from staff";
$result_min=  mysqli_query($connection,$sql_min);
$rws_min=  mysqli_fetch_array($result_min);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Staff</title>
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
       <!-- <link rel="stylesheet" href="newcss.css">   -->
		<link  href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <?php include 'header.php' ?>
     
    <div class="displaystaff_content">
       <?php //include 'admin_navbar.php'?>
                    <div class="displaystaff">
					
					<div class="container">
                <form action="delete_staff.php" method="POST">
            
                    <table align="center" class="table table-hover">
                        <caption align='center' style='color:#2E4372'> <h4 class="text-center"><u><b>Staff Details</b></u></h4></caption>
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
                            if($rws[0]==$rws_min[0]) echo' checked';
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
                    
                    
                        <tr>
                            <td><input type="submit" name="submit2_id" value="DELETE" class="btn btn-primary btn-lg" ></td>
                     <h3><a href="admin_homepage.php">Back</a></h3>
                    </form>
                        
                
                    
</div>
                    </div>
    </div>
          <?php //include 'footer.php';?>
		  <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
    </body>
</html>