<?php

        session_start();
        require ('dblogin.php');
        if(!isset($_SESSION['mort_login'])){
            header('Location:staff_login.php');
        }
		?>
		<?php 
$error="";
if (isset($_POST['search'])){
	include 'dblogin.php';
	$date = date("Y-m-d H:i:s");
	$searchId =$_POST['searchId'];
	$query = "SELECT * FROM deceased WHERE birthcert='".$_POST['searchId']."' OR nationalid='".$_POST['searchId']."'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==0){
				$error .= '<p class="alert alert-danger">Deceased not found</p>';
				}
				else{
	
	mysql_query("UPDATE deceased SET  discharge_date='$date' WHERE birthcert='".$_POST['searchId']."' OR nationalid='".$_POST['searchId']."'");
       
				$error .= '<p class="alert alert-success">Deceased discharged successfully</p>';
				}
				}

?>

<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    
</head>
<body>
<div class="row">
  <div class="col-md-3">
    </div>
	   <div class="col-md-6">
	   <br />
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Search Deceased Details</h3>
            </div>
			<?=$error?>
            <div class="panel-body">
                <form  action="" method="POST">
                    

                            <div class="form-group">
                               <br />
                             
                                    <input type="text" name="searchId" class="form-control" placeholder="Enter National Id/ Birth Certificate Number" autocomplete="on" required/>
									<br />
									 <input type="submit" class="btn btn-primary btn-lg" name="search" value="Search"/>
                                </div>
                               </form>
							   <h3><a href="mortuary_staffhomepage.php">Back</a></h3>
                            </div>
                    </div>

               
            </div>
			
			<div class="col-md-3">



        </div>
    </div>



</body>
</html>