<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Login </title>
	</head>
<body>
	
	<?php
	
		extract($_POST);
		if(isset($submit))
		{
    		$con=mysqli_connect("localhost","root","4946","login");
    		$rs=mysqli_query($con,"select * from login where username='$username' and password='$password'") or die(mysqli_connect_error());
			if(mysqli_num_rows($rs)==1)
			{
        		$_SESSION[login]="true";
        		//echo "sucess";
				// Create connection
				$conn = new mysqli("localhost","root", "4946", "cof");
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}


				date_default_timezone_set('Asia/Kolkata');
				//echo date('d-m-Y H:i');

				$date = date('Y/m/d H:i:s');
				$sql = "INSERT INTO coc (username, time)
				VALUES ('$username', '$date')";

				if ($conn->query($sql) === TRUE) {
				   // echo "New record created successfully";
				} else {
				   // echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();
        		
        		#include("frame.php");
        		echo "<a href="frame.php">PLease Proceed to Portal</a>";

			}
    		else
    		{
 		   	echo "Username and Password Combination is not matching !! Try Again !!";
	
    		}
		} 
		else if(!isset($_SESSION[login]))
		{	
	?>		
		<br><div class="alert alert-danger" role="alert"><h4><center>Your are not logged in</center>
	<?php
		
		exit;
		//echo "<a href=fhp4.php>start</a>";
		}
	?>

</body>
</html>
