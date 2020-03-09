<?php
	require 'dbconfig/config.php';
?>
<html>
	<head><title>Teacher Registration</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css" type="text/css">
	<body style="background:#485460">
		<div id="main-wrapper">
			<center>
				<h2>Teacher Registration</h2>
			</center>
		
			<form class="myform" action="teareg.php" method="post">
				<label><b>Teacher ID:</b></label><br>
				<input name="tid" type="text" class="inputvalues" placeholder="Type your ID number" required/><br>
				<label><b>Password:</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
				<label><b>Confirm Password:</b></label><br>
				<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" required/><br>
				<input name="submit-btn" type="submit" id="submit-btn" value="Submit"/><br>
				<a href="tealogin.php"><input type="button" id="register-btn" value="Back"/></a><br>
			</form>
			<?php
				if(isset($_POST['submit-btn']))
				{
					$tid=$_POST['tid'];
					$password=$_POST['password'];
					$cpassword=$_POST['cpassword'];
					
					
					if($password==$cpassword)
					{
						
							$query="SELECT * FROM teacherreg WHERE teacherid='$tid'";
							$query_run=mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0)
							{
								echo "<script type='text/javascript'>alert('User already exists')</script>";
							}
							else
							{
								$query1="SELECT * FROM teacherdetails WHERE teacherid='$tid'";
								$query_run1=mysqli_query($con,$query1);
								if(mysqli_num_rows($query_run1)>0)
								{
									$query="insert into teacherreg values('$tid','$password')";
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
								else
								{
									echo "<script type='text/javascript'>alert('such teacher id does not exist')</script>";
								}
						
								
								
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