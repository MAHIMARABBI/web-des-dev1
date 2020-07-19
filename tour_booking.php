<!DOCTYPE html>
<html>
<head>
	<title> VROMON | Book a tour</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Stylesheets/main.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/book-content.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/fonts.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/slideshow.css">
	<link rel="icon" href="Images/logo.jpg" type="image/jpg" sizes="16x16">
	<script src="Scripts/slideshow.js"></script>
	<script src="Scripts/booking.js"></script>
	<script src="Scripts/expand.js"></script>
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
	<div class="pageTitle">Book Your Next Trip</div>
	<form method="post" action="booking.php" name="tourBookForm" id="tourBookForm" onload="showStep()">
		<div class="steps">
			<div id="personal">Personal<br/>Information</div><!--
			--><div id="payment">Payment<br/>Process</div>
		</div>
		<div id="formPersonal">
			<div class="inputName">Tour ID</div>
			<input type="text" size="20" id="tour_id" class="inputField" name="tour_id" value="" disabled style="width: auto; display: inline-block; cursor: not-allowed;">
			
			<div class="inputName">Name</div>
			<input type="text" size="20" id="name" class="inputField" name="Name" required>
			
			<div class="inputName">Address</div>
			<input type="text" size="20" id="address" class="inputField" name="Address" required>
			
			<div class="inputName">Contact</div>
			<input type="text" size="20" id="contact" class="inputField" name="Contact" required>
			
			<div class="inputName">Email</div>
			<input type="text" size="20" id="email" class="inputField" name="Email" required>
			
			<div class="inputName">Gender</div>
			<input type="radio" id="male" value="male" name="gender" required>
			<label>Male</label>
			<input type="radio" id="female" value="female" name="gender">
			<label>Female</label>
			
			<div class="inputName">Blood Group</div>
			<select class="inputField" id="blood_group" name="blood_group" required>
				<option value="none">Select</option>
				<option value="A+">A+</option>
				<option value="A-">A+</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
			</select>
			<div class="inputName">Transportation Preference</div>
			<select class="inputField" id="transport" name="transport" required>
				<option value="none">Select</option>
				<option value="Bus">Bus</option>
				<option value="Plane">Air-Plane</option>
			</select>
			<div class="previous" onclick="next(-1)" style="display: none;">
				<span class="label">Go Back</span>
			</div>
			<div class="next" onclick="next(1)" style="margin-left: 7.8vw;">
				<span class="label">Continue</span>
			</div>
		</div>
		<div id="formPayment">
			<div id="price">Tour Price: <span id="value"></span></div>
			<div class="promo" onclick="showPromo()">Do you have a promo?</div>
			<input type="text" size="20" id="promo" class="inputField" name="promo" onkeyup="getPromo()">
			<div id="noPromo">* Invalid Promo Code *</div>
			<div id="totalPrice">Total Price: <span id="finalValue"></span></div>
			<div class="inputName">Choose Payment Method</div>
			<input type="radio" value="Visa_Card" name="paymentOption" onclick="checkMethod()" checked required/>
			<label>Visa Card</label>
			<input type="radio" value="Master_Card" name="paymentOption" onclick="checkMethod()">
			<label>Master Card</label>
			<input type="radio" value="Bkash" name="paymentOption" onclick="checkMethod()">
			<label>BKash</label>
			<input type="radio" value="Rocket" name="paymentOption" onclick="checkMethod()">
			<label>Rocket</label>
			
			<div class="inputName">Card Number</div>
			<input type="text" size="20" id="card_number" class="inputField" name="card_number">
			<div class="inputName">Expiry Date</div>
			<input type="date" size="20" id="exp_date" class="inputField" name="exp_date">
			<div class="inputName">CVV</div>
			<input type="password" size="20" id="cvv" class="inputField" name="cvv">
			<div class="inputName">Transaction ID</div>
			<input type="text" size="20" id="transaction_id" class="inputField" disabled name="transaction_id">
			
			<div class="previous" onclick="next(-1)">
				<span class="label">Go Back</span>
			</div>
			<input class="next" onclick="formReset()" style="margin-left: 7.8vw;" id="submit"  value="Submit" name="submit" type="submit">
		</div>
	</form>
	
	<div class="tourSection" id="tours">
		<div class="docTitle">Browse Our Exciting Packeges</div>
		<input type="text" id="tourSearch" placeholder="Search by Destination" onKeyUp="tourSearch()">
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

			$sql = "SELECT Tour_ID, Starting_point, Destination, Travel_Date, Cost, Duration, Description FROM tours";
			$result = $conn->query($sql);

			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<div class=tours>
			<div class=tourTitle>".$row["Starting_point"]." to ".$row["Destination"]."</div>
			<span class=tourID>Tour ID: ".$row["Tour_ID"]."</span>
			<div class=tourDuration>
					".$row["Duration"]."
			</div>
			<div class=tourPrice style='display: inline;'>".$row["Cost"]." BDT Only</div>
			<button class=bookBtn onclick=setID(".$row["Tour_ID"].",".$row["Cost"].")>Book</button>
			<div class=showDetails>See packege details
				<div class=tourDetails>
				Date: 24/09/20
				<br/><br/>
				".$row["Description"]."
				<br/>
				For further inquary, please <a href=Contact_us.html>Contact US</a>
				</div>
			</div>
			
		</div>";
				}
			}
			else
			{
				echo "results";
			}
			
			$conn->close();
		?>
	</div>
	<div id="promos">
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

			$sql = "SELECT User_ID FROM customer_record";
			$result = $conn->query($sql);

			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<div class=promocodes>".$row["User_ID"]."</div>";
				}
			}
			else
			{
				echo "results";
			}
			
			$conn->close();
		?>
	</div>
</body>
</html>