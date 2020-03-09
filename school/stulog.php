<?php
	require 'dbconfig/config.php';
	session_start();
?>
<html>
	<head>
	<title>Welcome</title>
	</head>
	<link rel="stylesheet" href="css/style.css.css">
	<body style="background-color:#ee5253">
		<div id="main-wrapper">
			<div id="logout">
				<a href="stulogin.php"><input name="logout-btn" type="button" id="logout-btn" value="Logout"/></a><br>
			</div>
			<center>
				<h2>Welcome user</h2>
			</center>
			<h2 style="margin-left:20px">Results</h2>
			<form class="myform" action="stulog.php" method="post">
				<label><b>Year:</b></label><br>
				<input name="year" type="type" class="inputvalues" placeholder="Enter year" required/><br>
				<input name="submit-btn" type="submit" id="submit-btn" value="Submit"/><br>
			</form>
			<?php
				if(isset($_POST['submit-btn']))
				{
					$year=$_POST['year'];
					$r=$_SESSION["roll"];
					
					$query="SELECT roll,name,maths,science,computer,year FROM studentresult WHERE roll='$r' AND year='$year'";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result) > 0)
					{
						echo "<table style='border-collapse:collapse;
	width:100%;
	color:#588c7e;
	font-size: 20px;
	text-align:left;
	margin-left:10px;
	'>";
						echo "<tr><th>Roll</th><th>Name</th><th>Maths</th><th>Science</th><th>Comp</th><th>Year</th></tr>";
						while($row = mysqli_fetch_assoc($result))
						{
							echo "<tr><th>".$row["roll"]."</th><th>".$row["name"]."</th><th>".$row["maths"]."</th><th>".$row["science"]."</th><th>".$row["computer"]."</th><th>".$row["year"]."</th></tr>";
						}
						echo "</table><br>";
					}
					else
					{
						echo "0 result";
					}
					
				}
			?>
			
		</div>
	</body>
</html>