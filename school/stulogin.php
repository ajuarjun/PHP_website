<?php
	require 'dbconfig/config.php';
	session_start();
?>
<html>
	<head><title>Student Login</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css">
	<body style="background:grey">
		<div id="main-wrapper">
			<center>
				<h2>Student Login</h2>
				<img id="stulogo" src="imgs/student.png">
			</center>
		
			<form class="myform" action="stulogin.php" method="post">
				<label><b>Roll number:</b></label><br>
				<input name="roll" type="text" class="inputvalues" placeholder="Type your roll number" required/><br>
				<label><b>Password:</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
				<input name="login-btn" type="submit" id="login-btn" value="Login"/><br>
				<a href="stureg.php"><input type="button" id="register-btn" value="Register"/></a><br>
			</form>
			<?php
				if(isset($_POST['login-btn']))
				{
					$roll=$_POST['roll'];
					$password=$_POST['password'];
					$query="SELECT * FROM studentreg WHERE roll='$roll' AND password='$password'";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result) > 0)
					{
						$_SESSION['roll']=$roll;
						header('location:stulog.php');
					}
					else
					{
						echo "<script type='text/javascript'>alert('invalid credentials')</script>";
					}
				}			
			?>
		</div>
	</body>
</html>