<?php 
session_start();
        
if(!isset($_SESSION['user_login'])) 
    header('location:admin_login.php');   
?>
<!DOCTYPE html>
<?php
include 'dblogin.php';
$error="";
@$id=  mysqli_real_escape_string($connection,$_REQUEST['staff_id']);
$sql="SELECT * FROM staff WHERE PFNumber='$id'";
$result=  mysqli_query($connection,$sql) or die(mysqli_error($connection));
$rws=  mysqli_fetch_array($result);
?>


<html>
    <head>
       
		<link  href="css/bootstrap.min.css" rel="stylesheet">
        <title>staff editing</title>
    </head>
  
  
    <body>
	  <?php include 'header.php' ?>
			<div class="container">	
                <form action="" method="POST">
            
			<div class="form-group">
			
			<table class="table table-hover" align="center" >
			
			<?php if (isset($_POST['submit']) && $error == '') { // if there is no error, then process further
				echo"<p class='alert alert-success'>Staff Details Were Successfully Edited.</p>"; // showing success message
				}
				?>
			
                <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
                 <h4 class="text-center"><u><b>Edit Staff</b></u></h4>
				
				<?php include 'alter_staff.php' ?>
				 <tr>
                    <td><label for="edit_name">STAFF'S NAME</label></td>
                    <td><input type="text" name="edit_name" class="form-control input-lg" value="<?php echo $rws[0];?>" required=""/></td>
                </tr>
               <tr>
                    <td><label for="edit_name">PF NUMBER</label></td>
                    <td><input type="text" name="pfnumber" class="form-control input-lg" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
              
				<tr>
                    <td><label for="edit_id">NATIONAL ID</label></td>
                    <td><input type="text" name="edit_id" class="form-control input-lg" value="<?php echo $rws[2];?>" required=""/></td>
                </tr>
				
               
               
                
                
                <tr>
                    <td><label for="edit_dept">DEPARTMENT</label></td>
                    <td>
                        <select name="edit_dept" class="form-control">
                            <option <?php if($rws[3]=="RECEPTION") echo "selected";?>>RECEPTION</option>
                            <option <?php if($rws[3]=="CONSULTATION") echo "selected";?>>CONSULTATION</option>
							<option <?php if($rws[3]=="LABORATORY") echo "selected";?>>LABORATORY</option>
							<option <?php if($rws[3]=="WARD") echo "selected";?>>WARD</option>
							<option <?php if($rws[3]=="PHARMACY") echo "selected";?>>PHARMACY</option>
							<option <?php if($rws[3]=="MORTUARY") echo "selected";?>>MORTUARY</option>
                        </select>
                    </td>
                </tr>
                
              
                
                    <td><label for="edit_mobile">PHONE</label></td>
                    <td><input type="text" name="edit_mobile" class="form-control input-lg" value="<?php echo $rws[4];?>" required=""/></td>
                </tr>

                <tr>
                    <td><label for="edit_email">EMAIL </label></td>
                    <td><input type="text" name="edit_email" class="form-control input-lg" value="<?php echo $rws[5];?>" required=""/></td>
                </tr>
                
               <tr>
                    <td colspan="3" align='center' style='padding-top:20px'><input type="submit" class="btn btn-primary btn-lg" name="submit" value="UPDATE DATA" /></td>
					
				</tr>	
               
            </table>
			</div>
        </form>
                <h3 class="text-center"><a href="display_staff.php">Back</a></h3>
                </div>
                
				<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>


    </body>
</html>
