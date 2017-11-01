<?php
    session_start();
    require('Connection.php');
    if(!isset($_SESSION['cons_login']))
        header('Location:staff_login.php');

   if(isset($_GET['patients_id'])) {

        $id=$_GET['patients_id'];

        if (isset($_POST['postToPharmacy'])) {


            $id=$_GET['patients_id'];
            $drugs = implode(",", $_POST['drugs']);
			$dosage= $_POST['dosage'];
			$prescription=explode(",",$_POST['dosage']);
			$date = date('Y-m-d H:i:s');
             $drug=$_POST['drugs'];
        
            $arrayNum=count($drug);
            $drugNum=$arrayNum-1;
			$prescriptionNumArray=count($prescription);
			$prescriptionNum=$prescriptionNumArray-1;
			
			

           /* for($i=$drugNum;$i>=0;$i--){
				
                    					 
             $insertDrug = mysqli_query($connection, "INSERT INTO drug_issue_records (drugname)VALUES ('$drug[$i]')");

            } */
			
            $sql = "UPDATE patients SET `Status`='ATTENDED' WHERE `CardNumber`='$id'";
            $sqlResult = mysqli_query($connection, $sql);

            $update = "UPDATE lab SET `ResultsStatus`='received' WHERE `cardnumber`='$id'";
            $updateResult = mysqli_query($connection, $update);
			$drugPrescription= '';
			 for($i=$drugNum;$i>=0;$i--){
				
                     $drugPrescription.= $drug[$i] . '   '. $prescription[$i].',';
                  if($i != 0){}else{	
				  
				  $query1="UPDATE patients_disease_record SET prescribed_drugs='$drugPrescription', Status='attended' WHERE cardnumber='$id' AND Status='unattended'";
			mysqli_query($connection,$query1 );
			

            $query =mysqli_query($connection, "INSERT INTO  consultpharm(cardnumber,Drug,Post_date)VALUES ('".$_GET['patients_id']."','$drugPrescription','$date')");
			
			
			
				  }
			 }

            /*mysqli_query($connection, $query);*/

            if (mysqli_affected_rows($connection) > 0) {
                echo '<p class="alert alert-success">Details submitted succesfully</p>';
            } else
                echo '<p class="alert alert-danger">Details submission failed';
        } else if (isset($_POST['postLab'])) {

            $tests =  implode(",",$_POST['tests']);
            $date = date('Y-m-d H:i:s');
            $connection = mysqli_connect('localhost:3306', 'root', "",'bandari2');
			
          /*$sql="UPDATE lab SET cardnumber='".$_GET['patients_id']."' ,tests='$tests',test_date='$date'";
             $query = mysqli_query($connection, $sql);*/
     
	 
             $query = "INSERT INTO lab(cardnumber,tests,test_date)VALUES ('$id','$tests','$date')";
			 

            mysqli_query($connection, $query);

       

            if (mysqli_affected_rows($connection) > 0) {
                echo "<p class='alert alert-success'>Tests Submitted Successfully</p>";
				
            } else
                echo '<p class="alert alert-danger"> Tests Submission failed</p>';
		}/*--*/
			else if (isset($_POST['records'])) {
            $id=$_GET['patients_id'];
            $disease =  implode(",",$_POST['disease']);
			 @$symptoms =$_POST['symptoms'];
            $date = date('Y-m-d');
            $connection = mysqli_connect('localhost:3306', 'root', "",'bandari');
			$dis=$_POST['disease'];
			
			$query=mysqli_query($connection, "SELECT age FROM patients WHERE cardnumber= '$id'");
			$age=mysqli_fetch_array($query);
        
            $arrayNum=count($dis);
            $diseaseNum=$arrayNum-1;

            for($i=$diseaseNum;$i>=0;$i--){

$insertDisease = mysqli_query($connection, "INSERT INTO diseases (cardnumber,Age,disease,post_date)VALUES ('$id','$age[0]','$dis[$i]','$date')");

            }
	 
             $query = "INSERT INTO patients_disease_record(cardnumber,symptoms,disease,TreatmentDate)VALUES ('$id','$symptoms','$disease','$date')";

            mysqli_query($connection, $query);

       

            if (mysqli_affected_rows($connection) > 0) {
                echo "<p class='alert alert-success'> Diagnosis Submitted Successfully</p>";
				
            } else
                echo '<p class="alert alert-danger"> Diagnosis Submission failed</p>';
			/*...*/
        } else if (isset($_POST['postToWard'])) {

                 
                 $disease =  implode(",",$_POST['disease']);
            $date = date('Y-m-d H:i:s');


            $sql = "UPDATE patients SET `status`='ATTENDED' WHERE `CardNumber`='$id'";
            $query = mysqli_query($connection, $sql);
			
			 $update = "UPDATE lab SET `ResultsStatus`='received' WHERE `cardnumber`='$id'";
            $updateResult = mysqli_query($connection, $update);


       /*  $insertRecord = mysqli_query($connection, "INSERT INTO patients_disease_record (cardnumber,disease,TreatmentDate)VALUES ('".$_GET['patients_id']."','$disease','$date')");*/
	   
       

            


            $query = "INSERT INTO consult_ward(cardnumber,disease,post_date)VALUES ('$id','$disease','$date')";

            mysqli_query($connection, $query);

            if (mysqli_affected_rows($connection) > 0) {
                echo "<p class='alert alert-success'>Details Submitted Successfully</p>";
            } else
                echo "<p class='alert alert-danger'>Details submission failed.</p>";
        }
    }
?>
<html>
<head>
                 <title>Patients Attendance</title>

							<script type="text/javascript" src="js/jquery.min.js" ></script>
							<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
							 <script type="text/javascript" src="js/bootstrap.min.js"></script>
							 <script type="text/javascript" src="Bootstrap-Multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
							 	
							 <link href="Bootstrap-Multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
						
							 
    
	
	  
</head>
<body>
 <?php //include 'header.php' ?>
 <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-5">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color:blue">Patient's Diagnosis</b></h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="POST">

                                <div class="form-group">
                                    <label  class="col-md-3 control-label">Signs and Symptoms</label>
                                    
                                       <div class="col-md-9">
                                        <textarea class="form-control" name="symptoms" placeholder="Enter Patient's Symptoms"></textarea>
                                    </div>

                                </div>

                              
                                <div class="form-group">
                                    <label for="disease"class="col-md-3 control-label">Disease</label>
                                         <div class="col-md-9">
                                        <select name="disease[]"  id="disease" class="form-control"  multiple>
                                   <?php require 'Connection.php';


                                 $sql="SELECT diseasename FROM alldiseases ORDER BY diseasename";
								 $result= mysqli_query($connection ,$sql);
								 
								 while ($disease= mysqli_fetch_array($result)){ ?>
								 <option value="<?php echo $disease [0]?>"> <?php echo $disease[0]?> </option>
								<?php	 
								 }

								   ?>
								    
									

        					</select> 
							
						
                                    </div>
                                  </div>
                                


                         
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit"  class="btn btn-primary pull-right" name="records">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
    <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color:blue">Patient's Previous Treatment Records</b></h3>
                        </div>
                        <div class="panel-body">
                            
            
           

            <?php

            $id=$_GET['patients_id'];
			$_SESSION['patients_id']=$id;

               $connection=mysqli_connect('localhost','root','','bandari');
            $query="SELECT disease,TreatmentDate FROM patients NATURAL JOIN patients_disease_record WHERE  `cardnumber`='$id' ";

            $queryResult=mysqli_query($connection,$query);
            $rows=mysqli_affected_rows($connection);
			
			if($rows >0){
				?>
         <table border='1' align='center' class='table table-hover text-center'>
			 
            <th>Disease</th>
            <th>Treatment Date</th>
			<?php

            while($rows=mysqli_fetch_array($queryResult)){

                echo "<tr><td>$rows[0]</td><td><a href='patients_treatmenthistory.php?TreatmentDate=$rows[1]' target='_blank'>$rows[1]</a></td></tr>";




            } ?>
		
			</table>
				<?php
			}
			else {
				echo "<p class='alert alert-danger'>No patient's Previous Treatment Records found</p>";
			}
            ?>


        
		                   
                        </div>
                    </div>
                </div>
</div>
<div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-5">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color:blue">Refer Patient to the Pharmacist</b></h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="POST">
<label for="disease"class="col-md-3 control-label">Drug</label>
                                         <div class="col-md-9">
                                <div class="form-group">
                                  <select name="drugs[]"  id="drugs" class="form-control"  multiple>
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
	</div>
		<div class="form-group">
	<label for="enddate" class="col-md-3 control-label" >Dosage</label>
	
	<div class="col-md-9">

		<input type="text" name ="dosage" class="form-control" id="dosage" placeholder="dosage" required> <br />
                                </div>
								</div>
                  
				  
                              
               
                                


                         
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit"  class="btn btn-primary pull-right" name="postToPharmacy">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
    <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color:blue">Refer Patient to Ward</b></h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="post">


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Disease</label>
                                    <div class="col-md-9">
                                    
              <select name="disease[]"  id="diseases" class="form-control"  multiple>
                                   <?php require 'Connection.php';


                                 $sql="SELECT diseasename FROM alldiseases ORDER BY diseasename";
								 $result= mysqli_query($connection ,$sql);
								 
								 while ($disease= mysqli_fetch_array($result)){ ?>
								 <option value="<?php echo $disease [0]?>"> <?php echo $disease[0]?> </option>
								<?php	 
								 }

								   ?>
  </select>								   
                                    </div>
                                </div>


                              


                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary pull-right" name="postToWard">Post to Ward</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
    <br/><br/>
<div class="row">
    <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color:blue">Refer Patient to the Laboratory</b></h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="POST">

                                <div class="form-group">
                                    <label  class="col-md-3 control-label">Tests</label>
                                    <div class="col-md-9">
                        <select name="tests[]"  id="tests" class="form-control"  multiple>
							
                                   <?php require 'Connection.php';


                                 $sql="SELECT testname FROM tests ORDER BY testname";
								 $result= mysqli_query($connection ,$sql);
								 
								 while ($tests= mysqli_fetch_array($result)){ ?>
								 <option value="<?php echo $tests [0]?>"> <?php echo $tests[0]?> </option>
								<?php	 
								 }

								   ?>
								   </select>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary pull-right" name="postLab">Post to Lab</button>
                                    </div>
                                </div>


                            </form>
                        </div>

                    </div>
                </div>

    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><b style="color:blue"><?php
                        require_once ('dblogin.php');
                $query="SELECT COUNT(*) FROM `lab` WHERE `TestsStatus`='attended' AND `ResultsStatus`='not received'";
                $queryResult=mysqli_query($connection,$query);

                $resultArray=mysqli_fetch_array($queryResult);
                echo $resultArray[0].' Posted Lab Results.';
                        ?></b></h3>
            </div>
            <div class="panel-body">
                <div class="panel-footer">
                    <h3 class="text-center"><a href="consViewLabResults.php" style="color: whitesmoke"><button type="submit" class="btn btn-primary">View Lab Results</button></a></h3>
                </div>

            </div>

        </div>
    </div>


                </div>
<h3 class='text-center'><a href='consultation_staffhome.php'>Back</a></h3>

							
   <!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	 <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
     <script src="jquery-ui/jquery-ui.js"></script> -->
	 
<script>
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
							</script>
	  
   

</body>
</html>
