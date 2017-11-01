
<html>
<head>
                 <title>Drug Issued Records</title>

							<link rel="stylesheet" type="text/css" href="bandaricss.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="jquery-ui/jquery-ui.css" rel="stylesheet">
     <script src="js/jquery.min.js"></script>
     <script src="jquery-ui/jquery-ui.js"></script>
	  <script src="js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="Bootstrap-Multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
							 	
							 <link href="Bootstrap-Multiselect/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
						
    <meta name="viewport" content="width=device-width, init-scale=1">
    
	
	  
</head>
<body>
<?php include 'header.php' ?>
<div class="row">
    
                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color:blue">Post Drugs Issued</b></h3>
                        </div>
                        <div class="panel-body">
                                <form action="" method="post">
								
			<div class="row">					
	
		<div class="form-group">
		   <label for="drug" class="col-md-3 control-label">Drug</label>
		     <div class="col-md-9">
		 <select name="drugs"  id="drugs" class="form-control">
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
	
	  </div>
	  <div class="row">
		<div class="form-group">
		<br />
		<label for="amount" class="col-md-3 control-label">Enter Amount</label>
		<div class="col-md-9">
		  <br />
		<input type="text" name ="amount" class="form-control" id="amount" > <br />
		    </div>
		</div>
		</div>
		<input type="submit" name="submit" value="submit" class="btn btn-primary btn-lg">
		<input type="submit" name="finish" value="finish" class="btn btn-primary btn-lg">
		
		

	</form>

	<?php
	if(isset($_GET['patients_id'])){
		$id=$_GET['patients_id'];
				if (isset($_POST['submit'])){
					$drug =$_POST['drugs'];
					$amount=$_POST['amount'];
					$date= date('Y-m-d');
					
					$query1=mysqli_query($connection,"SELECT Quantity FROM drugs WHERE drugname='$drug' ");
                        $rws= mysqli_fetch_array($query1);
                              if($amount > $rws[0]){
								echo "<p class='alert alert-danger'>Amount of drug requested is not available.</p>"; 
							  }								
							  	
       else{							  
					 $query = "INSERT INTO drug_issue_records(drugname,Quantity,post_date)VALUES ('$drug','$amount','$date')";
					 $query2= mysqli_query($connection,"UPDATE drugs SET Quantity= Quantity-'$amount' WHERE drugname='$drug'");

            mysqli_query($connection, $query);
	   
							  
            if (mysqli_affected_rows($connection) > 0) {
                echo "<p class='alert alert-success'>Records submitted  Succesfully</p>";
				
				}
				}
				}				else{ 
					
					if(isset($_POST['finish'])) {
    $sql = "UPDATE `consultpharm` SET `PharmStatus`='ATTENDED' WHERE cardnumber='" . $_GET['patients_id'] . "'";
    $result = mysqli_query($connection,$sql);
	  /* header('refresh:3;url=pharmViewUnattendedPatients.php');*/
	  echo"<p class='alert alert-success'>You succesfully finished recording drugs issued..You can go back to <a href='pharmViewUnattendedPatients.php'>attend new patient</a> </p>";
}
					
				}
	}?>
                        </div>
                    </div>

                </div>
				
				
				  
				<div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><b style="color:blue">Drugs to be recorded</b></h3>
                        </div>
                        <div class="panel-body">
                            
            
           

            <?php

            $id=$_GET['patients_id'];
			

               $connection=mysqli_connect('localhost','root','','bandari');
            $query="SELECT Drug FROM consultpharm  WHERE  `cardnumber`='$id' AND PharmStatus='unattended' ";

            $queryResult=mysqli_query($connection,$query);
            $rows=mysqli_affected_rows($connection);
			
			if($rows >0){
				?>
         <table border='1' align='center' class='table table-hover text-center'>
			 
            <th>Drugs</th>
      
			<?php

            while($rows=mysqli_fetch_array($queryResult)){

                echo "<tr><td>$rows[0]</td></tr>";




            } ?>
		
			</table>
			<?php } ?> 
				
				
				</div>
				
					 

    <br/><br/>
	  <script>
							$(document).ready(function (){
								$('#drugs').multiselect({
									nonSelectedText:'Select Drug',
									enableFiltering:true,
									enableCaseInsensitiveFiltering:true,
							        buttonWidth:"380px"
								});
							});
							</script>
							<script>
	$(document).ready(function() {
    $("#mySelect").change(function(){
        var val = $('#mySelect option:selected').val();    
        $.ajax({
            url: "path to php file to get the price",
            type: "POST",
            dataType: "HTML",
            data: {"id": val}
            async: false,
            success: function(data) {
              // for textbox add id as price
                 $("#price").val(data);// data will have the price echoed in somefilename.php          
            }
      }); 

    });
});
							</script>
	</body>
	</html>