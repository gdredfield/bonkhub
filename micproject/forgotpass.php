<?php  
session_start();
$host="localhost";
$user="root";
$password="";
$db="login";
	$con = mysqli_connect($host,$user,$password);
		   mysqli_select_db($con, $db);
	$username=$_SESSION['username'];
	$getuser=mysqli_query($con,"select * from users where username='$username'");
	$row=mysqli_fetch_assoc($getuser);
		if($_SERVER["REQUEST_METHOD"]==="POST"){
			if(isset($_POST['confirm'])){
				$em = $_POST['email'];
				if(empty($em)){
					header("Location: forgotpass.php?error=Email field is blank");
				}
				else if($row['email']==$em){
					header("Location: changepass.php");
				}
				else{
					header("Location: forgotpass.php?error=Incorrect Email");
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
		<h1>FORGOT<span>PASS</span></h1>
			<form action="" method="POST">
			<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>
			<input type="text" id= "user" name="user" class="text" value="<?php echo $username ?>" readonly>
			<br><hr><br>
			<input type="text" id= "email" name="email" class="text" placeholder="Account Email">
			<br><hr><br>
			<input type="submit" id="sub" name="confirm" value="Confirm">
	</div>
	</center>
</body>
</html>