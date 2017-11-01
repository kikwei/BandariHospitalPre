

<?php
session_start();
if(isset($_SESSION['user_login']))
	header('Location:admin_homepage.php');

?>
<?php
require ('dblogin.php');
  
$error = ""; // Initialize error as blank

if (isset($_POST['username'])){
        $username = $_POST['username'];
     
		$username = stripslashes($username);
		$username = mysqli_real_escape_string($connection,$username);
		
		
		$salt="@g26jQsG&nh*&#8v";
        $password=  sha1($_POST['password'].$salt);
		$password = stripslashes($password);
		$password =  mysqli_real_escape_string($connection,$password);
	
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
		$result = mysqli_query($connection,$query) or die(mysqli_error($connection));
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['user_login'] = $username;
			header("Location: admin_homepage.php"); // Redirect user to another page after login
			
			}else{
							$error .= '<p class="alert alert-danger"><b>Incorrect username or password</b>.</p>';
			}
}
			
		?>