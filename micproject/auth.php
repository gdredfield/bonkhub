<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="login";

	$con = mysqli_connect($host,$user,$password);
		   mysqli_select_db($con, $db);

if (isset($_SESSION['id']) && isset($_SESSION['username'])){
			if((time() - $_SESSION['timestamp']) > 300){ //60*5=300 seconds
			$_SESSION['auth_code']=0;
			}else{
			$_SESSION['timestamp']=time();
			
?>

<!DOCTYPE html>
<html>
	<head>
		<title>BONKHUB</title>
		<style>
			body{
				background: rgba(0,0,0,0.9)url(njjjjj.jpg);
				background-size:cover;
				background-blend-mode: darken;
				display: flex;
				justify-content: center;
				text-align: center;
				align-items: center;
				height: 100vh;
				flex-direction: column;
			}
			#main{
				background-color: #1b1b1b;
				width: 390px;
				border-radius: 15px;
			}
			#main2{
				background-color: #1b1b1b;
				width: 390px;
				border-radius: 15px;
			}

			#main2 h1{
				color: white;
				font-family: calibri;
				font-size: 15px;
				letter-spacing: 1px;
				display: inline-flex;
				flex-direction:column;
			}
			#main h1{
				color: white;
				font-family: calibri;
				background-color: black;
				letter-spacing: 1px;
				background-size: 3px 3px;
			}

			.text{
				font-family: calibri;
				background-color: #333;
				color: white;
				width: 250px;
				height: 25px;
				font-weight: bold;
				border: none;
				text-align: center;
			}
			hr{
				width: 250px;
				margin-top: 0px !important;
			}

			#sub{
				width: 220px;
				height: 30px;
				background-color: #ffa31a;
				font-family: calibri;
				font-weight: bold;
				border: none;
				float: middle;
				border-radius: 10px;
				margin-bottom: 20px;
			}
			span{
				color: black;
				background-color: #ffa31a;
				background-repeat: no-repeat;
				background-size: 1px 1px;
				border-radius: 4px;
			}
			.error{
				background: #1238;
				color: #A94442;
				padding: 10px;
				width: 80%;
				border-radius: 5px;
			}

			.success{
				background: #F2DEDE;
				color: #A94442;
				padding: 10px;
				width: 80%;
				border-radius: 5px;
			}
			.ba{
				font-size: 14px;
				display: inline-block;
				padding: 10px;
				text-decoration: underline;
				color: #ffa31a;
			}

			h2{
				color: white;
				font-family: calibri;
				color: #ffa31a;
				letter-spacing: 1px;
				text-decoration: underline;
			}

			h3{
				color: white;
				font-family: calibri;
				background-color: black;
				letter-spacing: 1px;
				font-size: 30px;
				background-size: 1px 1px;	
			}
		</style>
	</head>


	<body>
		<center>
		<div id="main2">
		<h3>BONK<span>HUB</span></h3>
		<h1>Please bonk the Authentication <span>CODE</span>below to proceed</h1>
			<form action="auth-process.php" method="POST">
			<h2><?php echo $_SESSION['auth_code']; ?></h2>
			<input type="text" name="aut" class="text" placeholder="Enter Authentication"><br><hr>
			<input type="submit" name="sub" class="sub" id="sub" align="center">
		</form>
	</div>
</center>
	</body>

</html>


<?php 
}
}
else{
	header("Location: login.php");
}

?>