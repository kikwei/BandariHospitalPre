
 	  <?php
/*session_start();
if(!isset($_SESSION['user_login']))
	header('Location:admin_login.php')*/

?>
<?php
ob_start();
session_start();
require('dbsettings.php');

$username=$_SESSION['rec_login'];

$userquery= "select * from staff where USERNAME='$username'";
$userquery=$sp->query($userquery) or die($sp->error);
$info=$userquery->fetch_object();
?>  
<!doctype html>
    <html>
	      <head>
		  <meta charset="UTF-8">
		  <title> profile</title>
		  <link  href="css/bootstrap.min.css" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, init-scale=1">
		  </head>
	
	               <body>
                           <div class="row">
                                 <div class="col-md-4">
                          </div>								 
<div class="col-md-4">
  <h3><u>Change Profile Picture</u></h3>
    
   <?php
	  
	
	     $user=$_SESSION['rec_login'];
	        $output_dir = "profileimage/";
		$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
		$extension = @end(explode(".", $_FILES["myfile"]["name"]));
		    if(isset($_POST['upload']))
		    {
			    //Filter the file types , if you want.
			    if ((($_FILES["myfile"]["type"] == "image/gif")
				    || ($_FILES["myfile"]["type"] == "image/jpeg")
				    || ($_FILES["myfile"]["type"] == "image/JPG")
				    || ($_FILES["myfile"]["type"] == "image/png")
				    || ($_FILES["myfile"]["type"] == "image/pjpeg"))
				    && ($_FILES["myfile"]["size"] < 504800)
				    && in_array($extension, $allowedExts)) 
			    {
				      if ($_FILES["myfile"]["error"] > 0)
					    {
					    echo "Return Code: " . $_FILES["myfile"]["error"] . "<br>";
					    }
				    if (file_exists($output_dir. $_FILES["myfile"]["name"]))
				      {
				      unlink($output_dir. $_FILES["myfile"]["name"]);
				      }	
					    else
					    {
					    $pic=$_FILES["myfile"]["name"];
					    $conv=explode(".",$pic);
					    $ext=$conv['1'];	
						    
					    //move the uploaded file to uploads folder;
				          move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$user.".".$ext);
					    
					    $pics=$output_dir.$user.".".$ext;
					  
					      
					    $url=$user.".".$ext;
					    
					    
					    $update="update staff set image='$url' where USERNAME='$user'";
					    
					    if($sp->query($update)){
						   echo '<div data-alert class="alert-box success radius">';
						      echo  '<b>Success !</b>  Image Updated' ;
						      echo  '<a href="#" class="close">&times;</a>';
						    echo '</div>';
						   header('refresh:3;url=rece_profile.php'); 
					    }
					    else{
						    echo '<div data-alert class="alert-box alert radius">';
						      echo  '<b>Error !</b> ' .$sp->error ;
						      echo  '<a href="#" class="close">&times;</a>';
						    echo '</div>';
					    }
					    
					    
					    
					    }
					    
			    }	
			    else{
			    
			       echo '<div data-alert class="alert-box warning radius">';
			        echo  '<b>Warning !</b>  File not Uploaded, Check image' ;
			        echo  '<a href="#" class="close">&times;</a>';
				echo '</div>';
		 
			    }

		    }	    
	         ?>

		
		<img src="profileimage/<?php echo $info->image; ?>" width="120" height="120" alt="User Image"/>
		
		
		
		    <form action="" method="post" enctype="multipart/form-data">
		    
			<span style="color:red;">Maximun Image Size 100KB</span><br/><br/>
			<input type="file" name="myfile"  required/>
		 
		
			<button type="submit" name="upload" class="tiny button radius success">Upload</button>
		 
		    </form>
			</div> 
			<div class="col-md-4">
			</div>
		</div>
  </body>
  </html>
