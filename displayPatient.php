<!Doctype html>
<html>
<head>
    <title>Delete Patient</title>
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
        <caption align='center' style='color:#2E4372'><h3><u>Delete Patient</u></h3></caption>

        <th></th>
        <th> NAME</th>
        <th>DATE OF BIRTH</th>
        <th>GENDER</th>
        
        <th>RESIDENCE</th>
        <th>PHONE</th>
        <th>KINS PHONE</th>
        <th>NATIONAL ID</th>
       
        <th>BIRTH CERTIFICATE</th>
        <th>CARD NUMBER</th>
        <th>REGISTRATION DATE</th>
		<tbody>
        <?php

        session_start();
        require ('dblogin.php');
        if(!isset($_SESSION['rec_login'])){
            header('Location:staff_login.php');
        }
        if(isset($_POST['search'])){
            $searchId=$_POST['searchId'];

      $error="";

			$query = "SELECT * FROM patients WHERE CardNumber='".$_POST['searchId']."' OR  BirthCertNo='".$_POST['searchId']."' OR NationalId='".$_POST['searchId']."'"; 
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==0){
				$error .= '<p class="alert alert-danger">Patient not found</p>';
				}
				else{
            $search="SELECT * FROM patients WHERE CardNumber='".$_POST['searchId']."' OR  BirthCertNo='".$_POST['searchId']."' OR NationalId='".$_POST['searchId']."'";

            $query=mysql_query($search);
            while($rows=mysql_fetch_array($query)){


                echo "<tr><td><input type='radio' name='patients_id' value='".$rows[8]."'></td><td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td><td>$rows[5]</td><td>$rows[6]</td><td>$rows[7]</td><td>$rows[8]</td><td>$rows[9]</td></tr>";
            }

        }
		}
        ?>
		</tbody>
    </table>

    <?=$error ?>
            <button type="submit" name="delete" class="btn btn-primary btn-lg">Delete</button><br />
			<h3 ><a href="reception_staffhome.php">Back</a></h3>
        </div>
    </form>
</div>

</body>
</html>