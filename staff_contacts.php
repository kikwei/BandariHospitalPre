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
        <title> Staff contacts</title>
        <style>
 
        </style>
      <link  href="css/bootstrap.min.css" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, init-scale=1">
    </head>
    
    <?php include 'header.php' ?>
   
               
                 <div class="container">
				  <!--<div class="table-responsive"> -->
                    <table class="table table-hover" align="center">
                        <caption align='center' style='color:#2E4372'> <h4 class="text-center"><u><b>Staff Contacts</b></u></h4></caption>
                         <thead>
						
                        <th>FULLNAME</th>
                        <th>DEPARTMENT</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        </thead>
						<tbody>
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                           echo "<tr>";
                            echo "<td>".$rws[0]."</td>";
                            echo "<td>".$rws[3]."</td>";
                          
                            echo "<td>".$rws[4]."</td>";
							 echo "<td>".$rws[5]."</td>";
                          
                            echo "</tr>";
                        }
                        ?>
						</tbody>
                    </table>
                    
                    
                   
                    
                        
                            
                       
					   <h3><a href="admin_homepage.php">Back</a></h3>
                        </div>
                   
                    
                
 

         <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script> 
    </body>
</html>