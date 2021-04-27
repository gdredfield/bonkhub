<?php  
session_start();
$host="localhost";
$user="root";
$password="";
$db="login";
	$con = mysqli_connect($host,$user,$password);
		   mysqli_select_db($con, $db);
	$username=$_SESSION['username'];
	$userid = $_SESSION['id'];
	$getuser=mysqli_query($con,"select * from users where username='$username'");
	$row=mysqli_fetch_assoc($getuser);
		if($_SERVER["REQUEST_METHOD"]==="POST"){
			if(isset($_POST['confirm'])){
				$pass1=$_POST['pass1'];
				$pass2=$_POST['pass2'];
				if(empty($pass1)){
					header("Location: changepass.php?error=Password field is empty");
				}
				else if(empty($pass2)){
					header("Location: changepass.php?error=Confirm password field is empty");
				}
				else if($pass1!=$pass2){
					header("Location: changepass.php?error=Passwords does not match");
				}
				else{
					mysqli_query($con,"update users set password='$pass1' where username='$username'");
					date_default_timezone_set('Asia/Manila');
		   			$date = date('d-m-y h:i:s', time());
		   			mysqli_query($con, "insert into event_log(activity,usrname,usr_id,date) values('Change Password','$username','$userid','$date')");
					header("Location: login.php?success=Changed password successfully!");
				}

				}

		}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Bonkers</title>
	<link href="style (1).css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
	<center>
	<div id="main">
		<h1>CHANGE NEW<span>PASS</span></h1>
			<form action="" method="POST">
			<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
			<input type="text" id= "user" name="user" class="text" value="<?php echo $username ?>" readonly>
			<br><hr><br>
			<input type="password" id= "pass1" name="pass1" class="text" placeholder="New Password">
			<br><hr><br>
			<input type="password" id= "pass2" name="pass2" class="text" placeholder="Confirm Password">
			<br><hr><br>
			<input type="submit" id="sub" name="confirm" value="Confirm">
	</div>
	</center>
</body>
</html>