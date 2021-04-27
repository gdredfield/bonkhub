<!DOCTYPE html>
<html>
<head>
		<title>BONKHUB SIGN UP</title>
		<link rel="stylesheet" type="text/css" href="style (1).css">
			

</head>
<body>
</br></br></br>
<center>
	<div id="main">
		<h1>BONK<span>HUB</span></h1>
		<h2>Sign up</h2>
		<form action="regi-checker.php" method="POST">
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<?php if(isset($_GET['success'])) { ?>
			<p class="success"><?php echo $_GET['success']; ?></p>
		<?php } ?>

		<?php if(isset($_GET['username'])) { ?>
			<input type="text" 
					id="user" 
					name="user" 
					class="text" 
					placeholder="Enter username"
					value="<?php echo $_GET['username']; ?>">
					<br><hr><br>
		<?php }else{ ?> 
			<input type="text" 
					id="user" 
					name="user" 
					class="text" 
					placeholder="Enter username" >
					<br><hr><br>
					<?php }?>

		<?php if(isset($_GET['email'])) { ?>
			<input type="text" 
					id="email" 
					name="email" 
					class="text" 
					placeholder="Enter email"
					value="<?php echo $_GET['email']; ?>">
					<br><hr><br>
		<?php }else{ ?> 
			<input type="text" 
					id="email" 
					name="email" 
					class="text" 
					placeholder="Enter email">
					<br><hr><br>
					<?php }?>

				 <input type="password" id="pass" name="pass" class="text" placeholder="Enter password">
				 	<br><hr><br>
				 <input type="password" id="cpass" name="cpass" class="text" placeholder="Confirm password">
				 	
				 	<br><hr><br>
				<input type="Submit" name="btn" id="sub" value="Sign Up"><br>
				<a href = "login.php" class="ba">Already have an account?</a>
	</form>
	</div>
	</center>
</body>
</html>
