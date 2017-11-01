<?php
session_start();

include 'dblogin.php';

if(!isset($_SESSION['pharm_login'])) 
    header('location:staff_login.php');

?>
<!doctype html>
<html>
   <head>
		  <meta charset="UTF-8">
		  <title> drug management</title>
		  <link  href="css/bootstrap.min.css" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, init-scale=1">
	   <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="Bootstrap-Multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
							 	
							 <link href="Bootstrap-Multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
               
		  </head>
	 <body>
	 <?php
 include 'header.php';

$error = ""; 

if (isset($_POST['submit'])) { 

	@$drug = $_POST['drugname'];
	
	$quantity=$_POST['quantity'];
	$units=$_POST['units'];

    $connection = mysqli_connect('localhost:3306', 'root', "",'bandari2');

$dupdrug=mysqli_query($connection,"SELECT * FROM drugs WHERE drugname ='".$_POST['drugname']."'");
	$rowId = mysqli_num_rows($dupdrug);
	if($rowId ==1){
		$update=mysqli_query($connection, "UPDATE drugs SET Quantity=Quantity+'$quantity' WHERE drugname='$drug'");
		if (mysqli_affected_rows ($connection) >0){
			 echo"<p class='alert alert-success'> Drug Quantity Succesfully updated</p>";
				
		}
		else{
			echo"<p class='alert alert-danger'>Records update failed</p>";

		}
		
	}else{
	    echo "<p class='alert alert-danger'>Fatal Error Occurred!</p>";
    }

}
else {
    if (isset($_POST['post'])) {
        @$medicine = $_POST['medicine'];
        $quantity = $_POST['quantity'];
        $units = $_POST['units'];
        $connection = mysqli_connect('localhost:3306', 'root', "", 'bandari2');

        $sql = "SELECT COUNT(drugName)FROM `DRUGS` WHERE drugName='$medicine'";
        $result = mysqli_query($connection, $sql);

        $resultArray=mysqli_fetch_array($result);
        if ($resultArray[0] > 0) {
            echo "<p class='alert alert-danger'>Drug Already Registered! Just Update its Quantity!</p>";
        } else {
            mysqli_query($connection, "INSERT INTO drugs(drugname,Quantity,Units)VALUES('$medicine','$quantity','$units')");

            if (mysqli_affected_rows($connection) > 0) {
                echo "<p class='alert alert-success'> New Drug Succesfully Registered</p>";

            } else {
                echo "<p class='alert alert-danger'>Drug Registration Failed!</p>";

            }

        }

    }
}
?>
<div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-5">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color:blue">New Drug Registration and Registered Drug Quantity Update</b></h3>
                        </div>
                        <div class="panel-body">
                                <form action="" method="post">
		  <h4><b style="color:blue">Please choose an action below to proceed</b></h4>
                        
		<div class="form-group">
		    <br />
			<br />
	
           <input type="radio" name ="radio" id="yesCheck"> Update Amount Of Registered Drug<br /><br />
		    <input type="radio" name ="radio" id="noCheck"> Register New Drug
			<br /> <br />
		<div id="no">
		<label for="drugname">Drug Name</label>
		<select name="drugname"  id="drugs"  class="form-control">
                                   <?php require 'Connection.php';


                                 $sql="SELECT drugname FROM drugs ORDER BY drugname";
								 $result= mysqli_query($connection ,$sql);
								 
								 while ($drug= mysqli_fetch_array($result)){ ?>
								 <option value="<?php echo $drug [0]?>"> <?php echo $drug[0]?> </option>
								<?php	 
								 }

								   ?>
    </select>
	</div>
	   <div id="yes">
		<label for="drugname">Drug Name</label>
		<input type="text" name ="medicine" class="form-control"  placeholder="drugname"> <br />
	</div>
		
		<div id="quantity">
		<label for="quantity">Quantity</label>
		<input type="text" name ="quantity"   class="form-control"  placeholder="quantity"> <br />
	</div>
		<div id ="units">
		<label for="units">Units</label>
		<select name="units"  class="form-control">
		     <option>litres</option>
		      <option>Mililitres</option>
		       <option>Grams</option>
		       <option>Tablets</option>
		     </select>
		  </div>
		<br />
        
		<input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary btn-lg">
		
	
		<input type="submit" name="post" id="post" value="submit" class="btn btn-primary btn-lg">
		
		
</div>
</div>
</div>
</div>
<div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><b style="color:blue" >Available Drugs</b></h3>
            </div>
            <div class="panel-body">
                <div class="panel-footer">
                    <h3 class="text-center"><a href="availabledrugs.php" style="color: whitesmoke"><button type="button" class="btn btn-primary">View Available Drugs</button></a></h3>
                </div>

            </div>

        </div>
    </div>


                </div>
<h3 class='text-center'><a href='pharmacy_staffhomepage.php'>Back</a></h3>
<script>
							$(document).ready(function (){
								$('#drugs').multiselect({
									nonSelectedText:'Select Drug',
									enableFiltering:true,
									enableCaseInsensitiveFiltering:true,
							        buttonWidth:"500px"
								});
							});
						
							</script>
	  

<script>
                   
							$(window).on("load",function (){
								$('#submit').hide();
								$('#yes').hide();
									$('#no').hide();
										$('#post').hide();
											$('#units').hide();
												$('#quantity').hide();
								
								});
						
							
							$(document).ready(function (){
								$('#disease').multiselect({
									nonSelectedText:'Select Disease',
									enableFiltering:true,
									enableCaseInsensitiveFiltering:true,
							        buttonWidth:"380px"
								});
							});
							
							
							$(document).ready(function (){
								$('#diseases').multiselect({
									nonSelectedText:'Select Disease',
									enableFiltering:true,
									enableCaseInsensitiveFiltering:true,
							        buttonWidth:"380px"
								});
							});
							
							
							$(document).ready(function (){
								$('#drugs').multiselect({
									nonSelectedText:'Select Drug',
									enableFiltering:true,
									enableCaseInsensitiveFiltering:true,
							        buttonWidth:"380px"
								});
							});
							
							
							$(document).ready(function (){
								$('#tests').multiselect({
									nonSelectedText:'Select Test',
									enableFiltering:true,
									enableCaseInsensitiveFiltering:true,
							        buttonWidth:"380px"
								});
							});
							
							$(document).ready(function (){
								$('#yesCheck').click(function() {
									$('#yes').hide();
										$('#units').hide();
									$('#no').show();
									$('#submit').show();
									$('#post').hide();
										$('#quantity').show();
								});
								$('#noCheck').click(function() {
									$('#yes').show();
									$('#no').hide();
										$('#units').show();
										$('#post').show();
										$('#submit').hide();
										$('#quantity').show();
								});
							});
							</script>
							
   
     </body>
	</form>
                        
                    </div>

    <br/><br/>
	</body>
	</html>