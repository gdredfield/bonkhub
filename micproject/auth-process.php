<?php 
session_start();
$host="localhost";
$user="root";
$password="";
$db="login";
	$con = mysqli_connect($host,$user,$password);
		   mysqli_select_db($con, $db);

$username = $_SESSION['username'];
$userid = $_SESSION['id'];
					if(isset($_POST['aut'])){
						$authi=($_POST['aut']);
						if (empty($authi)){
							header("Location: logout.php");
						}
						else if ((time() - $_SESSION['timestamp']) > 300){ //60*5=300 seconds
							$_SESSION['auth_code']=0;
							if ($_POST['aut']==$_SESSION['auth_code']){
							echo"Authentication Successful!";
							}
							else{
							header("Location: logout.php");
							}
						} 

						else if($_POST['aut']==$_SESSION['auth_code']){
							if($_SESSION['username']=="ADMIN"){
								date_default_timezone_set('Asia/Manila');
		   						$date = date('d-m-y h:i:s', time());
		   						mysqli_query($con, "insert into event_log(activity,usrname,usr_id,date) values('Login','$username','$userid','$date')");
								header("Location: admain.php");
							}
							else{
								date_default_timezone_set('Asia/Manila');
		   						$date = date('d-m-y h:i:s', time());
		   						mysqli_query($con, "insert into event_log(activity,usrname,usr_id,date) values('Login','$username','$userid','$date')");
								header("Location: main.php");
							}
						}
						else {
							header("Location: logout.php");
						}
					}
					else{
						header("Location: logout.php");

					}?>