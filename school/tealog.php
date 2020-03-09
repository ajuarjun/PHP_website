<?php
	require 'dbconfig/config.php';
?>
<html>
	<head>
	<title>Welcome</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css">
	<body style="background-color:#78e08f">
		<div id="main-wrapper">
			<div id="logout">
				<a href="tealogin.php"><input type="button" id="logout-btn" value="Logout"/></a><br>
			</div>
			<center>
				<h2>Welcome user</h2>
			</center>
			<h2 style="margin-left:20px">Student Result</h2>
			<form class="myform" action="tealog.php" method="post">
				<label><b>Name:</b></label><br>
				<input name="name" type="text" class="inputvalues" placeholder="Type student's name" required/><br>
				<label><b>Roll number:</b></label><br>
				<input name="roll" type="text" class="inputvalues" placeholder="Type student's roll number" required/><br>
				<label><b>Mathematics:</b></label><br>
				<input name="maths" type="text" class="inputvalues" placeholder="Type student's marks" required/><br>
				<label><b>Science:</b></label><br>
				<input name="science" type="text" class="inputvalues" placeholder="Type student's marks" required/><br>
				<label><b>Computer:</b></label><br>
				<input name="comp" type="text" class="inputvalues" placeholder="Type student's marks" required/><br>
				<label><b>Year:</b></label><br>
				<input name="year" type="text" class="inputvalues" placeholder="Type year of result" required/><br>
				
				<input name="submit-btn" type="submit" id="submit-btn" value="Submit"/><br>
			</form>
			<?php
				if(isset($_POST['submit-btn']))
				{
					$name=$_POST['name'];
					$roll=$_POST['roll'];
					$maths=$_POST['maths'];
					$science=$_POST['science'];
					$comp=$_POST['comp'];
					$year=$_POST['year'];
					
				
						if($roll==$roll)
						{
							$query="SELECT * FROM studentresult WHERE roll='$roll'";
							$query_run=mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0)
							{
								echo "<script type='text/javascript'>alert('User already exists')</script>";
							}
							else
							{
								$query="insert into studentresult values('$name','$roll','$maths','$science','$comp','$year')";
								$query_run=mysqli_query($con,$query);
								if($query_run)
								{
									echo "<script type='text/javascript'>alert('Successfully result entered')</script>";
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
			?>
		</div>
	</body>
</html>