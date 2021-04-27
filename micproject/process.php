<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="login";

	$con = mysqli_connect($host,$user,$password);
		   mysqli_select_db($con, $db);
	if(isset($_POST['login'])){
		if(isset($_POST['user']) && isset($_POST['pass'])){
			function validate($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
									}
			$username = validate($_POST['user']);
			$password = validate($_POST['pass']);

			if (empty($username) && empty($password)){
				header("Location: login.php?error=Username and Password fields are blank");
			}

			else if (empty($password)){
				header("Location: login.php?error=Password field is blank");
			}

			else if (empty($username)){
				header("Location: login.php?error=Username field is blank");
			}

			else{	
				$sql = "SELECT * FROM users where username='$username'";
				$sql1 = "SELECT * FROM users where username='$username' AND password='$password'";
				$result = mysqli_query($con, $sql);
				$result1 = mysqli_query($con, $sql1);

						if (mysqli_num_rows($result)===0){
						header("Location: login.php?error=User does not exist");
						}
						else if (mysqli_num_rows($result1)===1){
						$row = mysqli_fetch_assoc($result1);//capitalization
						if($row['username']==$username && $row['password']==$password){
							$auth=rand(100000,999999);
							$authsql = "UPDATE users SET auth_code='$auth' where username='$username'";
							$result2 = mysqli_query($con, $authsql);
							$authsql1 = "SELECT * FROM users where username='$username'";
							$result3 = mysqli_query($con, $authsql1);
							$row1 = mysqli_fetch_assoc($result3);
							$_SESSION['username']=$row['username'];
							$_SESSION['id']=$row['id'];
							$_SESSION['auth_code']=$row1['auth_code'];
							$_SESSION['timestamp']=time();
							header("Location: auth.php");
							/*$auth=rand(100000,999999);
							if ($row['auth_code']<100000 || $row['auth_code']>999999 ||$row['auth_code']>=100000 || $row['auth_code']<=999999){
								$authsql = "UPDATE users SET auth_code='$auth' where username='$username'";
								$result2 = mysqli_query($con, $authsql);
								$authsql1 = "SELECT * FROM users where username='$username'";
								$result3 = mysqli_query($con, $authsql1);
								$row1 = mysqli_fetch_assoc($result3);
								echo $row1['auth_code'];
							}
							else {
								header("Location: login.php?error=Authentication Generate Failed");
								
							}*/
						}
						else {
							header("Location: login.php?error=Incorrect username or password");
						}
					}
					else{
						header("Location: login.php?error=Incorrect username or password");
					}
		}
	}
}


else if(isset($_POST['forgot'])){
		   		if(isset($_POST['user'])){
		   			$user=$_POST['user'];
		   			$getuser=mysqli_query($con,"select * from users where username='$user'");

		   			if(empty($user)){
		   				header("Location: login.php?error=Username is blank");
		   			}
		   			else if(mysqli_num_rows($getuser)===0){
		   				header("Location: login.php?error=Username does not exist");
		   			}
		   			else if(mysqli_num_rows($getuser)>0){
		   				$row = mysqli_fetch_assoc($getuser);
		   				$username= $row['username'];
		   				$userid= $row['id'];
		   				date_default_timezone_set('Asia/Manila');
		   				$date = date('d-m-y h:i:s', time());
		   				mysqli_query($con, "insert into event_log(activity,usrname,usr_id,date) values('Forgot Password Attempt','$username','$userid','$date')");
		   				$_SESSION['username']=$row['username'];
		   				$_SESSION['id']=$row['id'];
		   				header("Location: forgotpass.php");
		   			}
		   		}
		   		else{
		   			header("Location: login.php?error=Username is blank");
		   		}
		   
		   	}

?>