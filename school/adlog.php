<?php
	require 'dbconfig/config.php';
?>
<html>
	<head>
	<title>Welcome</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css">
	<body style="background-color:#60a3bc">
		<div id="main-wrapper">
			<div id="logout">
				<a href="adlogin.php"><input type="button" id="logout-btn" value="Logout"/></a><br>
			</div>
			<center>
				<h2>Welcome user</h2>
			</center>
			<h2 style="margin-left:20px">Teacher Details</h2>
			<form class="myform" action="adlog.php" method="post">
				<label><b>Name:</b></label><br>
				<input name="name" type="text" class="inputvalues" placeholder="Type teacher's name" required/><br>
				<label><b>ID number:</b></label><br>
				<input name="id" type="text" class="inputvalues" placeholder="Type teacher's ID number" required/><br>
				<label><b>Phone number:</b></label><br>
				<input name="phone" type="text" class="inputvalues" placeholder="Type teacher's phone number" required/><br>
				<input name="submit-btn" type="submit" id="submit-btn" value="Submit"/><br>
			</form>
			<?php
				if(isset($_POST['submit-btn']))
				{
					$name=$_POST['name'];
					$id=$_POST['id'];
					$phone=$_POST['phone'];
					
					
						if($id==$id)
						{
							$query="SELECT * FROM teacherdetails WHERE teacherid='$id'";
							$query_run=mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0)
							{
								echo "<script type='text/javascript'>alert('User already exists')</script>";
							}
							else
							{
								$query="insert into teacherdetails values('$name','$id','$phone')";
								$query_run=mysqli_query($con,$query);
								if($query_run)
								{
									echo "<script type='text/javascript'>alert('teacher details entered')</script>";
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