
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
		 <h4 class="text-center"><u>Diseases Frequency Report</u></h4>
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
	 
	 <th>Disease</th><th>Times occured</th>
	 </thead>
	 
	 <tbody>
	 
 <?php
 include 'dblogin.php';
 if(isset($_POST['submit'])){
	 
	 
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
	 $startage=$_POST['startage'];
	  $endage=$_POST['endage'];
	 $query="SELECT DISTINCT disease FROM diseases WHERE post_date  >='$startdate' AND post_date  <='$enddate' AND Age >='$startage' AND Age <='$endage' ORDER BY disease";
	 $result=mysqli_query($connection,$query);
 
	
	 while($rws=mysqli_fetch_array($result)){
		 echo "<tr><td>$rws[0]</td>";
	
       $count="SELECT  COUNT(disease) FROM diseases WHERE post_date >='$startdate' AND post_date <='$enddate' AND disease='$rws[0]' AND Age >='$startage' AND Age <='$endage'";
	 $resot=mysqli_query($connection,$count);
	    while ($countresult=mysqli_fetch_array($resot)){
			echo "<td>$countresult[0]</td></tr>";
		}
	 }
		
		echo "<h4>Disease Reports From <b><i>$startdate</i></b> to <b><i>$enddate</i> Within the age $startage to $endage years. </b></h4>";
	 
 }
 
 ?>
 </tbody>
</table>
   <p>NB:The above list consists ONLY of the diseases that occured within the given period and within the given age range.</P>
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