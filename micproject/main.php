<?php  
session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['id'];
$host="localhost";
$user="root";
$password="";
$db="login";
	$con = mysqli_connect($host,$user,$password);
		   mysqli_select_db($con, $db);
			if($_SERVER["REQUEST_METHOD"]==="POST"){
				if(isset($_POST['logout'])){
					date_default_timezone_set('Asia/Manila');
					$date = date('d-m-y h:i:s', time());
					mysqli_query($con, "insert into event_log(activity,usrname,usr_id,date) values('Logout','$username','$userid','$date')");
					header("Location: logout2.php");
					}

				}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BONKHUB!</title>
	<link href="style (1).css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
	<center>
		<div id="main">
			<form method="POST">
			<h1>BONK<span>HUB</span></h1>
			<h3>Welcome, <?php echo $_SESSION['username'];?>!</h3>
			<input type="submit" id="sub" name="logout" value="Logout">
			</form>
		</div>
	</center>
</body>
</html>