
<?php

$host="localhost";
$user="root";
$password="";
$db="login";
$auth=rand(0,999999);

	$con = mysqli_connect($host,$user,$password);
		   mysqli_select_db($con, $db);

		if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['email'])){
			function validate($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			$username = validate($_POST['user']);
			$password = validate($_POST['pass']);
			
			$email = validate($_POST['email']);
			$cpassword = validate($_POST['cpass']);

			$user_data = 'username='. $username. '&email='. $email;


			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password);



			if (empty($username)){
				header("Location: registration.php?error=Username field is required&$user_data");
			}

			else if (empty($email)){
				header("Location: registration.php?error=Email field is required&$user_data");
			}

			else if (empty($password)){
				header("Location: registration.php?error=Password field is required&$user_data");
			}
			
			else if (empty($cpassword)){
				header("Location: registration.php?error=Confirm password field is required&$user_data");
			}

			else if ($cpassword!=$password){
				header("Location: registration.php?error=Confirmation password does not match&$user_data");
			}
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  header("Location: registration.php?error=Invalid email format&$user_data");
            }

            else if (strlen($password)<8){
            	  header("Location: registration.php?error=Password should be atleast 8 characters in length&$user_data");
           	}

            else if (!$uppercase){
            	  header("Location: registration.php?error=Password should atleast include one upper case letter&$user_data");
           	}
           	else if (!$lowercase){
            	  header("Location: registration.php?error=Password should atleast include one lower case letter&$user_data");
           	}
           	else if (!$number){
            	  header("Location: registration.php?error=Password should atleast include one number&$user_data");
           	}
           	else if (!$specialChars){
            	  header("Location: registration.php?error=Password should atleast include one special character&$user_data");
           	}
           	



			else{
				$sql = "SELECT * FROM users where username='$username'";
				$result = mysqli_query($con, $sql);

					if (mysqli_num_rows($result)>0){
						header("Location: registration.php?error=Username is already taken&$user_data");
						}
					else {
						$sql2 = "INSERT INTO users(username, password, email) VALUES ('$username', '$password', '$email')";
						$result2 = mysqli_query($con, $sql2);
						if ($result2){
							header("Location: registration.php?success=Your account has been created successfully");
						}
						else{
							header("Location: registration.php?error=Unknown error occurred&$user_data");
						}
						
					}
	}
}
?>