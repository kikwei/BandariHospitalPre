<html>
    <head>
       
		<link  href="css/bootstrap.min.css" rel="stylesheet">
        <title>disease number</title>
    </head>
    
	<body>
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-3"></div>
	     <div class="col-md-6">
		 <div class="row">
		 <div class="col-md-12">
		 <h3 class="text-center"><b>The Bandari Hospital.</b> </h3>
		 <h4 class="text-center"><u>Drug Issuance Report</u></h4>
		 </div>
		 </div>
		 </div>
	<div class="col-md-3">
	</div>
	</div>	
</div>	
<div class="container-fluid">
  <div class="row-fluid">

          <div class="col-md-3"></div>
       <div class="col-md-6">	

          <br />	   
	 <table class="table table-hover">
	  <thead>
	 
	 <th>Drug</th><th>Amount Issued</th>
	 </thead>
	 
	 <tbody>
	 
 <?php
 include 'dblogin.php';
 if(isset($_POST['submit'])){
	 
	 
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
	 
	 $query="SELECT DISTINCT drugname FROM drug_issue_records WHERE post_date  >='$startdate' AND post_date  <='$enddate' ORDER BY drugname";
	 $result=mysqli_query($connection,$query);
 
	
	 while($rws=mysqli_fetch_array($result)){
		 echo "<tr><td>$rws[0]</td>";
	
       $count="SELECT  SUM(Quantity) FROM drug_issue_records  WHERE post_date >='$startdate' AND post_date <='$enddate' AND drugname='$rws[0]'";
	 $resot=mysqli_query($connection,$count);
	    while ($countresult=mysqli_fetch_array($resot)){
			echo "<td>$countresult[0]</td></tr>";
		}
	 }
		
		echo "<h4>Drug Reports From <b><i>$startdate</i></b> to <b><i>$enddate</i></b></h4>";
	 
 }
 
 ?>
 </tbody>
</table>
   <p>NB:The above list consists ONLY of the amount of drugs issued within the given period.</P>
    <p>As generated by Name :.............................Signature:......................Date:.................Stamp:..............</p>
  <form><input type="button" value="Print Report" onclick="window.print()" class="btn btn-primary btn-sm"/></form>
<h3 ><a href="reports.php">Back</a></h3>
 </div>
 <div class="col-md-3"></div>
 </div>
 </div>
 


 
<script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>
</body>
</html>