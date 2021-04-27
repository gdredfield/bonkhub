<!DOCTYPE html>
<html>
	<head>
		<title>BONKHUB login</title>
		<link href="style (1).css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	</head>
	<body></br></br></br>
		<center>
			<div id="main">
			<h1>BONK<span>HUB</span></h1>
			<form action="process.php" method="POST">
			<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } 
				  else if(isset($_GET['success'])) { ?>
			<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?>
				 <input type="text" id= "user" name="user" class="text" placeholder="Enter username">
				 <br><hr><br>
				 <input type="password" id= "pass" name="pass" class="text" placeholder="Enter password">
				 <br><hr><br>
				<input type="Submit" name="login" id="sub" value="Login"><br>
				<a href = "registration.php"class="ba">Create Account</a>
				<input type="Submit" id="forgot" name="forgot" class="ba1" value="Forgot Password?">
				</form>
			</div>
			</center>
	</body>
</html>


