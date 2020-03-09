<?php
	require 'dbconfig/config.php';
?>
<html>
	<head><title>Admin Login</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css" type="text/css">
	<body style="background:grey">
		<div id="main-wrapper">
			<center>
				<h2>Admin Login</h2>
				<img id="adlogo" src="imgs/admin.png">
			</center>
		
			<form class="myform" action="adlogin.php" method="post">
				<label><b>Username:</b></label><br>
				<input name="name" type="text" class="inputvalues" placeholder="Type your username" required/><br>
				<label><b>Password:</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
				<label><b>School ID:</b></label><br>
				<input name="sid" type="password" class="inputvalues" placeholder="Type the school ID" required/><br>
				<input name="submit-btn" type="submit" id="login-btn" value="Login"/><br>
				<a href="adreg.php"><input type="button" id="register-btn" value="Register"/></a><br>
			</form
			<?php
				if(isset($_POST['submit-btn']))
				{
					$name=$_POST['name'];
					$password=$_POST['password'];
					$sid=$_POST['sid'];
					
					$query="SELECT * FROM adminreg WHERE username='$name' AND password='$password' AND schoolid='$sid'";
					$query_run=mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						$_SESSION['name']=$name;
						header('location:adlog.php');
					}
				}
			?>
		</div>
	</body>
</html>