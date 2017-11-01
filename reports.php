<?php

require('Connection.php');
session_start();

if(!isset($_SESSION['user_login']))
    header('Location:admin_login.php');
?>
<html>
<head>
                 <title>Reports</title>

							<link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="jquery-ui/jquery-ui.css" rel="stylesheet">
     <script src="js/jquery.min.js"></script>
     <script src="jquery-ui/jquery-ui.js"></script>
	  <script src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, init-scale=1">
    
	
	  
</head>
<body>
<?php include 'header.php' ?>
<div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-5">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b>Generate Disease Reports By Date</b></h3>
                        </div>
                        <div class="panel-body">
                                <form action="track_diseaseprocess.php" method="post">
		
		<div class="form-group">
		    <br />
			<br />
	
		<script>
         $(function() {
            $( "#datepicker-10" ).datepicker({
               changeMonth:true,
               changeYear:true,
               numberOfMonths:[1,1],
			   dateFormat:"yy-mm-dd"
            });
         });
      </script>
	  <script>
	  $(function() {
            $( "#datepicker-11" ).datepicker({
				
               changeMonth:true,
               changeYear:true,
			   
               numberOfMonths:[1,1],
			   dateFormat:"yy-mm-dd"
			    
            });
         });
      </script>
		
		<label for="startdate">Start Date</label>
		<input type="text" name ="startdate" class="form-control" id="datepicker-10" placeholder="yyyy-mm-dd"> <br />
		
		
		<label for="enddate">End Date</label>
		<input type="text" name ="enddate" class="form-control" id="datepicker-11" placeholder="yyyy-mm-dd"> <br />
		<input type="submit" name="submit" value="submit" class="btn btn-primary btn-lg">
		
</div>
	</form>
                        </div>
                    </div>

                </div>
    <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b>Generate Drugs Issued Reports</b></h3>
                        </div>
                        <div class="panel-body">
                           <form action="drugsTrend.php" method="post">
		
		<div class="form-group">
		    <br />
			<br />
	   		<script>
         $(function() {
            $( "#datepicker-12" ).datepicker({
               changeMonth:true,
               changeYear:true,
               numberOfMonths:[1,1],
			   dateFormat:"yy-mm-dd"
            });
         });
      </script>
	  <script>
	  $(function() {
            $( "#datepicker-13" ).datepicker({
				
               changeMonth:true,
               changeYear:true,
			   
               numberOfMonths:[1,1],
			   dateFormat:"yy-mm-dd"
			    
            });
         });
      </script>
		
		
		
		<label for="startdate">Start Date</label>
		<input type="text" name ="startdate" class="form-control" id="datepicker-12" placeholder="yyyy-mm-dd"> <br />
		
		
		<label for="enddate">End Date</label>
		<input type="text" name ="enddate" class="form-control" id="datepicker-13" placeholder="yyyy-mm-dd"> <br />
		<input type="submit" name="submit" value="submit" class="btn btn-primary btn-lg">
		
</div>
	</form>
                        </div>
                    </div>
                </div>
</div>
<div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-5">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b>Generate Disease Reports By Age and Date</b></h3>
                        </div>
                        <div class="panel-body">
                                <form action="track_disease_by_age.php" method="post">
		
		<div class="form-group">
		    <br />
			<br />
	
		<script>
         $(function() {
            $( "#datepicker-14" ).datepicker({
               changeMonth:true,
               changeYear:true,
               numberOfMonths:[1,1],
			   dateFormat:"yy-mm-dd"
            });
         });
      </script>
	  <script>
	  $(function() {
            $( "#datepicker-15" ).datepicker({
				
               changeMonth:true,
               changeYear:true,
			   
               numberOfMonths:[1,1],
			   dateFormat:"yy-mm-dd"
			    
            });
         });
      </script>
		
		<label for="startdate">Start Date</label>
		<input type="text" name ="startdate" class="form-control" id="datepicker-14" placeholder="yyyy-mm-dd"> <br />
		
		
		<label for="enddate">End Date</label>
		<input type="text" name ="enddate" class="form-control" id="datepicker-15" placeholder="yyyy-mm-dd"> <br />
	
		
		<label for="startdate">Start Age</label>
		<input type="text" name ="startage" class="form-control" id="datepicker-14" > <br />
		
		
		<label for="enddate">End Age</label>
		<input type="text" name ="endage" class="form-control" id="datepicker-15" > <br />
		<input type="submit" name="submit" value="submit" class="btn btn-primary btn-lg">
		
</div>
	</form>
                        </div>
                    </div>

                </div>
				</div>
    <br/><br/>
	</body>
	</html>