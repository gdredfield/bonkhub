<?php  
session_start();
$host="localhost";
$user="root";
$password="";
$db="login";
$username=$_SESSION['username'];
$userid = $_SESSION['id'];
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
	<link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
	<center>
		<div id="main">
			<form method="POST">
			<h1>BONK<span>HUB</span></h1>
			<h3>Admin Page Event Log</h3>
			<input type="submit" id="sub" name="logout" value="Logout">
			</form>
			<table>
				<thead>
					<th>Event ID</th>
					<th>Activity</th>
					<th>Username</th>
					<th>User ID</th>
					<th>Date</th>
				</thead>
				<?php  
				$dbase=mysqli_query($con,"select * from event_log");
				while($row=mysqli_fetch_array($dbase)){
				?>
				<tbody>
					<th><?php echo $row['event_id'] ?></th>
					<th><?php echo $row['activity'] ?></th>
					<th><?php echo $row['usrname'] ?></th>
					<th><?php echo $row['usr_id'] ?></th>
					<th><?php echo $row['date'] ?></th>
				<tbody>
				<?php } ?>
			</table>
		</div>
	</center>
</body>
</html>