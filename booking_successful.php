<!DOCTYPE html>
<html>
<head>
	<title> VROMON | Booking successful</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Stylesheets/main.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/book-content.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/fonts.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/slideshow.css">
	<script src="Scripts/slideshow.js"></script>
	<script src="Scripts/booking.js"></script>
	<script src="Scripts/expand.js"></script>
	<script src="Scripts/tourSearch.js"></script>
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
			<a href="tours.html">
				<span class="bullet">&#10004;</span>
				Book a trip
			</a>
		</div>
	</div>
	<div id="formFinal">
			<div class="congrats">
				You have successfully booked for your next trip !
			</div>
			Your user id is:
			<span class="user_id">
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

					$sql = "
							SELECT User_ID 
							FROM customer_record 
    						ORDER BY User_ID DESC  
    						LIMIT 1;
							";
					$result = $conn->query($sql);

					if ($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							$value = $row["User_ID"] + 1;
							echo $value;
						}
					}
				
					$conn->close();
				?>
			</span>
			<i>You can enter this id as voucher for your next 2 trips.</i>
			<br/><br/>
			Please Download your recipt from the link below. You will have to show this reciept at reporting.
			<a href="Reciepts/REGISTRATION_FORM_18121059_MD._ASIF_IMRAN_KHAN_null.pdf">Download</a>
			
			<a href="tours.html">
				Book another trip
			</a>
			
		</div>
</body>
</html>