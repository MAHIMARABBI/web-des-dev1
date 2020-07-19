<?php
//formSubmit.php
if(isset($_POST['submit']))
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tour_management";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error)
	{
    	die("Connection failed: " . $conn->connect_error);
	}
	if(! get_magic_quotes_gpc() ) 
	{
		$Name = addslashes ($_POST['Name']);
		$Address = addslashes ($_POST['Address']);
		$Contact = addslashes ($_POST['Contact']);
		$Email = addslashes ($_POST['Email']);
		$Blood_Group = addslashes ($_POST['blood_group']);
		$Gender = addslashes ($_POST['gender']);
		$Transport = addslashes ($_POST['transport']);
		$PaymentOption = addslashes ($_POST['paymentOption']);
		$CardNo = addslashes ($_POST['card_number']);
		$ExpDate = addslashes ($_POST['exp_date']);
		$Cvv = addslashes ($_POST['cvv']);
		$TID = addslashes ($_POST['transaction_id']);
		/*$Tour_ID = addslashes ($_POST['tour_id']);*/
	}
	else 
	{
		$Name = $_POST['Name'];
		$Address = $_POST['Address'];
		$Contact = $_POST['Contact'];
		$Email = $_POST['Email'];
		$Blood_Group = $_POST['blood_group'];
		$Gender = $_POST['gender'];
		$Transport = $_POST['transport'];
		$PaymentOption = $_POST['paymentOption'];
		$CardNo = $_POST['card_number'];
		$ExpDate = $_POST['exp_date'];
		$Cvv = $_POST['cvv'];
		$TID = $_POST['transaction_id'];
		/*$Tour_ID = $_POST['tour_id'];*/
	}
	
	$user_id_sql = "SELECT User_ID FROM customer_record ORDER BY User_ID DESC  LIMIT 1;";
	$result = $conn->query($user_id_sql);

	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$User_ID = $row["User_ID"] + 1;
		}
	}
	
	$sql = "INSERT INTO customer_record (Name, Address, Contact, Email, Blood_Group, Gender, Transport) VALUES ('$Name', '$Address', '$Contact', '$Email', '$Blood_Group', '$Gender', '$Transport')";
	
	$payment = "INSERT INTO payment (User_ID, Name, Method, Card_Number, Expiry_Date, CVV, Transaction_ID) VALUES ('$User_ID', '$Name', '$PaymentOption', '$CardNo', '$ExpDate', '$Cvv', '$TID')";
	
	if ($conn->query($sql) === TRUE && $conn->query($payment) === TRUE)
	{
    	header("Location: booking_successful.php");
	}
	else
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>