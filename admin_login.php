<!doctype html>
<html>
<head>
	<title> Adminstrator Login Page</title>
	    <link rel="stylesheet" type="text/css" href="bandaricss.css">
	         <link  href="css/bootstrap.min.css" rel="stylesheet">
	               <meta name="viewport" content="width=device-width, init-scale=1">
</head>

<body style="background-color:#FFF;">
        <?php
        include 'header.php'
        ?>

        <?php
        include 'admin_loginprocess.php'
        ?>
		
		

		          <form  method="post" action="admin_login.php" autocomplete="off">
	  
	  
<div class="row">

<div class="  col-md-4" >
	       </div>
      
		   
		   <div class="  col-md-4">
		<div class="form-group">
	<div class="panel panel-default">	
		<div class="panel-body">
		     
		 <h4 class="text-center"><u><b>Management Login</b></u></h4>
		 <?=$error?>
		       <label for "username">USERNAME</label>
		<input type="text" name="username" id="username" class="form-control input-lg" placeholder="username" value="<?=@$username?>" required/>
	        
	           <br /><br />
            
                              <label for "password">PASSWORD</label>
<input type="password" name="password" id="password" class="form-control input-lg" placeholder="password"  />
            
			  <br />
				   
                                  <input type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-lg"><br />
                     </div>
					 </div>
					 </div>
                              </div>
                       </div>
					   
            </form>
<div class="col-md-4"></div>
                
	                 
	
	               <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
	
	</body>
	</html>