<!DOCTYPE html>
<html>
<head>
	<title> VROMON | Employee Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Stylesheets/main.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/employee-content.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/fonts.css">
	<link rel="icon" href="Images/logo.jpg" type="image/jpg" sizes="16x16">
	<script src="Scripts/search.js"></script>
</head>
<body>
	<div class="header">
		<a href="home.html">
		<img class="logo" src="Images/logo.jpg" alt="logo">
		</a>
		<div class="title">
			VROMON
		</div>
		<div class="navbar">
			<a href="#">Gallery</a>
			<a href="#">Services</a>
			<a href="#">About Us</a>
			<a href="tour_booking.php">
				<span class="bullet">&#10004;</span>
				Book a trip
			</a>
		</div>
	</div>
	<div class="pageTitle">Employee Information</div>
	<input class="employeeSearch" id="employeeSearch" onKeyUp="employeeSearch()" placeholder="Search by Name">
	<table id="employeeTable">
		<thead>
			<tr>
				<th>Employee ID</th>
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Salary</th>
				<th>Rating</th>
				<th>Assaigned Tour</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "tour_management";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT * FROM employee";
			$result = $conn->query($sql);

			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<tr class=row><td class=searchTerm>".$row["ID"]."</td><td>".$row["Name"]."</td><td>".$row["Contact"]."</td><td>".$row["Email"]."</td><td>".$row["Salary"]."</td><td>".$row["Rating"]."</td><td>".$row["Responsible_Tour_ID"]."</td></tr>";
				}
			}
			else
			{
				echo "results";
			}
			
			$conn->close();
		?>
		</tbody>
	</table>
</body>
</html>