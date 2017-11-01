<?php

        session_start();
        require ('dblogin.php');
        if(!isset($_SESSION['mort_login'])){
            header('Location:staff_login.php');
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
            <div class="panel-body">
                <form  action="display_deceased.php" method="POST">
                    

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