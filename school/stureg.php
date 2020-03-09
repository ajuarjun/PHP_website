<?php
	require 'dbconfig/config.php';
?>
<html>
	<head><title>Student Registration</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css">
	<body style="background:#ffdd59">
		<div id="main-wrapper">
			<center>
				<h2>Student Registration</h2>
			</center>
		
			<form class="myform" action="stureg.php" method="post">
				<label><b>Roll number:</b></label><br>
				<input name="roll" type="text" class="inputvalues" placeholder="Type your roll number" required/><br>
				<label><b>Password:</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
				<label><b>Confirm Password:</b></label><br>
				<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" required/><br>
				<input name="submit-btn" type="submit" id="submit-btn" value="Submit"/><br>
				<a href="stulogin.php"><input type="button" id="register-btn" value="Back"/></a><br>
			</form>
			<?php
				if(isset($_POST['submit-btn']))
				{
					$roll=$_POST['roll'];
					$password=$_POST['password'];
					$cpassword=$_POST['cpassword'];
					
					if($password==$cpassword)
					{
						$query="SELECT * FROM studentreg WHERE Roll='$roll'";
						$query_run=mysqli_query($con,$query);
						if(mysqli_num_rows($query_run)>0)
						{
								echo '<script type="text/javascript">alert("User already exists")</script>';
						}
						else
						{
							$query="insert into studentreg values('$roll','$password')";
							$query_run=mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("user registered go to login page")</script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Error 404")</script>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("password and confirm password does not match")</script>';
					}
				}
			?>
		</div>
	</body>
</html>