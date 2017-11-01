<?php 
session_start();
        
if(!isset($_SESSION['rec_login'])) 
    header('location:admin_login.php');   
?>
<!DOCTYPE html>
<?php
include 'dblogin.php';
$error="";
@$id=  mysqli_real_escape_string($connection,$_POST['patients_id']);
$sql="SELECT * FROM patients WHERE CardNumber='$id'";
$result=  mysqli_query($connection,$sql) or die(mysqli_error($connection));
$rws=  mysqli_fetch_array($result);
?>

<html>
    <head>
       <!-- <link rel="stylesheet" type="text/css" href="newcss.css"/> -->
		<link  href="css/bootstrap.min.css" rel="stylesheet">
        <title>edit patient details</title>
    </head>
    
      
    <?php include 'edit_patientprocess.php'?>
              
				
			<div class="container">	
			     <div class="row">
				     <div class="col-md-1"></div>
					 <div class="col-md-10">
                <form action="" method="POST">
            
			<div class="form-group">
			
			<table class="table table-hover" align="center" >
			
                <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>EDIT PATIENT DETAILS</u></h3></td></tr>
                <tr>
				<?php if (isset($_POST['alter']) && $error == '') { // if there is no error, then process further
				echo"<p class='alert alert-success'>Patients Details Were Successfully Edited.</p>"; // showing success message
				}
				?>
                    <td><label for="edit_name">PATIENT'S NAME</label></td>
                    <td><input type="text" name="edit_name" class="form-control input-lg" value="<?php echo $rws[0];?>" required=""/></td>
                </tr>
              
               <tr>
                    <td><label for="dob">DATE OF BIRTH</label></td>
                    <td><input type="text" name="dob" class="form-control input-lg" value="<?php echo $rws[1];?>" required=""/></td>
                </tr>
                <tr>
                    <td><label for="age">AGE</label></td>
                    <td><input type="text" name="age" class="form-control input-lg" value="<?php echo $rws[2];?>" required=""/></td>
                </tr>
                
                
                <tr>
                    <td><label for="gender">GENDER</label></td>
                    <td>
                        <select name="gender" class="form-control">
                            <option <?php if($rws[3]=="Male") echo "selected";?>>Male</option>
                            <option <?php if($rws[3]=="Female") echo "selected";?>>Female</option>
				
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="residence">RESIDENCE</label></td>
                    <td><input type="text" name="residence" class="form-control input-lg" value="<?php echo $rws[4];?>" required=""/></td>
                </tr>
              
                
                    <td><label for="edit_mobile">PHONE</label></td>
                    <td><input type="text" name="edit_mobile" class="form-control input-lg" value="<?php echo $rws[5];?>" required=""/></td>
                </tr>

				
				<td><label for="kinsphone">PHONE OF KIN</label></td>
                    <td><input type="text" name="kinsphone" class="form-control input-lg" value="<?php echo $rws[6];?>" required=""/></td>
                </tr>
            <td><label for="nationalid">NATIONAL ID</label></td>
                    <td><input type="text" name="nationalid" class="form-control input-lg" value="<?php echo $rws[7];?>" required=""/></td>
                </tr>

				<td><label for="birthcert">BIRT CERTIFICATE NUMBER</label></td>
                    <td><input type="text" name="birthcert" class="form-control input-lg" value="<?php echo $rws[8];?>" required=""/></td>
                </tr>
                    
                <tr>
                    <td><label for="cardnumber">CARD NUMBER </label></td>
                    <td><input type="text" name="cardnumber" class="form-control input-lg" value="<?php echo $rws[9];?>" required=""/></td>
                </tr>
                
                <tr>
                    <td colspan="3" align='center' style='padding-top:20px'><input type="submit" class="btn btn-primary btn-lg" name="alter" value="UPDATE DATA" /></td>
					
                </tr>
            </table>
			</div>
			<h3 align='center'><a href="reception_staffhome.php">Back</a></h3>
        </form>
               </div> 
			       <div class="col-md-1"></div>
                </div>
			</div>	
                
                
				<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>


    </body>
</html>
