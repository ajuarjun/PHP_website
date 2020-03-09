<?php
	require 'dbconfig/config.php';
?>
<html>
	<head><title>Admin Registration</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css" type="text/css">
	<body style="background:#3c6382">
		<div id="main-wrapper">
			<center>
				<h2>Admin Registration</h2>
			</center>
		
			<form class="myform" action="adreg.php" method="post">
				<label><b>Username:</b></label><br>
				<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
				<label><b>Password:</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
				<label><b>Confirm Password:</b></label><br>
				<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" required/><br>
				<label><b>School ID:</b></label><br>
				<input name="schoolid" type="password" class="inputvalues" placeholder="Type your school ID" required/><br>
				<label><b>Confirm School ID:</b></label><br>
				<input name="cschoolid" type="password" class="inputvalues" placeholder="Confirm your school ID" required/><br>
				<input name="submit-btn" type="submit" id="submit-btn" value="Submit"/><br>
				<a href="adlogin.php"><input type="button" id="register-btn" value="Back"/></a><br>
			</form>
			<?php
				if(isset($_POST['submit-btn']))
				{
					$username=$_POST['username'];
					$password=$_POST['password'];
					$cpassword=$_POST['cpassword'];
					$schoolid=$_POST['schoolid'];
					$cschoolid=$_POST['cschoolid'];
					
					if($password==$cpassword)
					{
						if($schoolid==$cschoolid)
						{
							$query="SELECT * FROM adminreg WHERE username='$username'";
							$query_run=mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0)
							{
								echo "<script type='text/javascript'>alert('User already exists')</script>";
							}
							else
							{
								$query="insert into adminreg values('$username','$password','$schoolid')";
								$query_run=mysqli_query($con,$query);
								if($query_run)
								{
									echo "<script type='text/javascript'>alert('user registered go to login page')</script>";
								}
								else
								{
									echo "<script type='text/javascript'>alert('Error 404')</script>";
								}
							}
						}
						else
						{
							echo "<script type='text/javascript'>alert('schoolid and confirm schoolid does not match')</script>";
						}
					}
					else
					{
						echo "<script type='text/javascript'>alert('password and confirm password does not match')</script>";
					}
				}
			?>
		</div>
	</body>
</html>