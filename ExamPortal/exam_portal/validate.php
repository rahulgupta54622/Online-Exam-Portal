<?php

	$email = $_POST["email"];
	$password = $_POST["psw"];
	// echo $password.'<br>';
	// //$pass = md5($password);
	// echo $password.'<br>';

	if($password == "Admin@123" and $email == "admin@gmail.com")
	{
		session_start();
		setcookie("email", $email, time() + 120, "/");
		setcookie("password", $password, time() + 120, "/");
		$_SESSION["admin"] = "admin@gmail.com";
		header('Location:admin_console.php');
	}

	else
	{

				$host = "localhost";
				$dbUsername = "root";
				$dbPassword = "";
				$dbName = "login_details";

				$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

				if(mysqli_connect_error())
				{
					die("Connection failed: " . $conn->connect_error);
				}
				else
				{

					$SELECT = "SELECT Password FROM  details WHERE Email = '$email'";
					$result = mysqli_query($conn,$SELECT);

					$row = mysqli_fetch_assoc($result);
					
					$n = mysqli_num_rows($result);
				
						session_start();
						if(isset($_SESSION["username"]))
						{
							header('Location: user_console.php');
						}
						else
						{
							if($row['Password'] == $password)
							{
								setcookie("email", $email, time() + 120, "/");
								setcookie("password", $password, time() + 120, "/");
								$_SESSION["username"] = $email;
								header('Location: validate.php');
							}
							else 
							{
								echo "<script>alert('incorrect credentials')</script>";
								echo "<script>location.href = 'front.php'</script>";
							}
						}
				}
	}

?>

