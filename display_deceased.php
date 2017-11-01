<!Doctype html>
<html>
<head>
    <title>Display Deceased</title>
    <link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, init-scale=1">
</head>
<body>

 <style>
            .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
}
#button{
    border:none;
}
</style>
  
<div class="container">
    <form  action="delete_patient.php" method="post">
     <div class="form-group">
    <table  class="table table-hover">
        <caption align='center' style='color:#2E4372'><h3><u>Deceased Details</u></h3></caption>

       
        <th> NAME</th>
		  <th>GENDER</th>
		   <th>NATIONAL ID</th>
		   <th>BIRTH CERTIFICATE</th>
        <th>DATE OF BIRTH</th>
       <th>DATE OF DEATH</th>
       
       
        
        <th>AGE</th>
        <th>DATE OF ADMISSION</th>
		<th>DATE OF DISCHARGE</th>
		<tbody>
        <?php

        session_start();
        require ('dblogin.php');
        if(!isset($_SESSION['mort_login'])){
            header('Location:staff_login.php');
        }
        if(isset($_POST['search'])){
         $searchId=$_POST['searchId'];
		 $error="";
         $query = "SELECT * FROM deceased WHERE birthcert='".$_POST['searchId']."' OR nationalid='".$_POST['searchId']."'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==0){
				$error .= '<p class="alert alert-danger">Deceased not found</p>';
				}
				else{

            $search="SELECT * FROM deceased WHERE birthcert='".$_POST['searchId']."' OR nationalid='".$_POST['searchId']."'";

            $query=mysql_query($search);
            while($rows=mysql_fetch_array($query)){


                echo "<tr><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td><td>$rows[6]</td><td>$rows[7]</td><td>$rows[8]</td><td>$rows[9]</td></tr>";
            }

        }
		}
        ?>
		</tbody>
    </table>
       <?=$error?>
 
            
			<h3 ><a href="mortuary_staffhomepage.php">Back</a></h3>
        </div>
    </form>
</div>

</body>
</html>