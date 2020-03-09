<?php
	require 'dbconfig/config.php';
?>
<html>
	<head><title>Teacher Login</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css" type="text/css">
	<body style="background:grey">
		<div id="main-wrapper">
			<center>
				<h2>Teacher Login</h2>
				<img id="tealogo" src="imgs/teacher.png">
			</center>
		
			<form class="myform" action="tealogin.php" method="post">
				<label><b>Teacher ID:</b></label><br>
				<input name="tid" type="text" class="inputvalues" placeholder="Type your ID number" required/><br>
				<label><b>Password:</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
				<input name="submit-btn" type="submit" id="login-btn" value="Login"/><br>
				<a href="teareg.php"><input type="button" id="register-btn" value="Register"/></a><br>
			</form>
			<?php
				if(isset($_POST['submit-btn']))
				{
					$tid=$_POST['tid'];
					$password=$_POST['password'];
					$query="SELECT * FROM teacherreg WHERE teacherid='$tid' AND password='$password'";
					$query_run=mysqli_query($con,$query);
					
						if(mysqli_num_rows($query_run)>0)
						{
							$_SESSION['tid']=$tid;
							header('location:tealog.php');
						}
						else
						{
							echo '<script type="text/javascript">alert("invalid")</script>';
						}
					
				}
			?>
		</div>
	</body>
</html>