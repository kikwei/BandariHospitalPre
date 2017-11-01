
<!doctype html>
<html>
<head>
	<title> Staff Login Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
			 <link rel="stylesheet" href="testing.css">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#FFF;">
        <?php include 'header.php' ?>
		
		
      <?php include 'staff_loginprocess.php' ?>
		          
	  
<div class="row">

<div class="col-md-4" >
	       </div>
      
		   
		   <div class="col-md-4">
		  
		   <form role="form" method="post" action="staff_login.php" autocomplete="off">
	  
		<div class="form-group">
		   <div class="panel panel-default">
		   <div class="panel-body">
		  <?=$error?>
		      <h4 class="text-center"><u><b>Staff Login</b></u></h4>
		       <label for "username">USERNAME</label>
		<input type="text" name="username" id="username" class="form-control input-lg" placeholder="username" value="<?=@$username?>" required/>
	        
	           <br /><br />
            
                              <label for "password">PASSWORD</label>
<input type="password" name="password" id="password" class="form-control input-lg" placeholder="password"   required/>
            
			  <br />
				   
                                  <input type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-lg" ><br />
                     </div>
					   </form>
					   </div>
					  </div>
							  
                       </div>
					   
           
<div class="col-md-4"></div>
                </div>
	                 
	
	               <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
	
	</body>
	</html>