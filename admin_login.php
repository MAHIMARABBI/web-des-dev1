<!DOCTYPE html>
<html>
<head>
	<title> VROMON | Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Stylesheets/main.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/login-content.css">
	<link rel="stylesheet" type="text/css" href="Stylesheets/fonts.css">
	<link rel="icon" href="Images/logo.jpg" type="image/jpg" sizes="16x16">
	<script src="Scripts/expand.js"></script>
	<?php
	if(isset($_POST['login'])) 
	{ 
		$u_name = $_POST['userName'];
		$pass = $_POST['password'];
		$username = "Admin";
		$password = "gtx1080ti";
		
		if($u_name === $username && $pass === $password)
		{
			header("Location: Admin/employee_details.php");
		}
		else
		{
			echo "<style type='text/css'>
			#warning
			{
				display:none;
			}
			</style>";
		}
	}
	?>
</head>
<body style="width: 100%;">
	<div id="loginSection">
		<div class="formTitle">Admin login</div>
		<form id="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="label">User Name</div>
			<input type="text" id="userName" name="userName" maxlength="30" class="inputBox">
			<br/>
			<br/>
			<div class="label">Password</div>
			<input type="password" id="password" name="password" maxlength="30" class="inputBox">
			<br/>
			<div id="warning">Invalid Username or Password !</div>
			<input type="reset" class="btn" value="Reset">
			<input type="submit" class="btn" value="Login" name="login">
		</form>
	</div>
</body>
</html>