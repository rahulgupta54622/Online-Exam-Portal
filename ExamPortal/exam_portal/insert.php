<?php 
	$name = $_POST["name"];
	$dob = $_POST["dob"];
	$email = $_POST["email"];
	$mobile = $_POST["mobile_no"];
	$password = $_POST["psw1"];
	//$password = md5($password);
	$roll = $_POST["roll"];
	$branch = $_POST["branch"];
	$sgpa = $_POST["sgpa"];
	$cgpa = $_POST["cgpa"];
	$tenth = $_POST["tenth"];
	$twelth = $_POST["twelth"];
	$n = 0;

	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "login_details";

	

	$conn = new mysqli($host, $dbUsername, "", $dbName);
	$rahul_conn = new mysqli($host, $dbUsername, "", "ExamPortalDb");

	if(mysqli_connect_error())
	{
		die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		echo "connected successfully"."<br>";
		$SELECT = "SELECT email FROM details WHERE email = '$email' ";
		$result = mysqli_query($conn,$SELECT);
		$n = mysqli_num_rows($result);
		if($n==0)
		{
			$INSERT = "INSERT INTO details (Name,DOB,Email,Mobile,Password,Roll, Branch, SGPA, CGPA, Tenth, Twelth) VALUES ('$name','$dob','$email','$mobile','$password','$roll','$branch','$sgpa','$cgpa','$tenth','$twelth')";

			$result = "INSERT INTO 	Student(email) VALUES ('$email') ";
			mysqli_query($rahul_conn, $result);

			if(mysqli_query($conn,$INSERT))
			{
				header('Location: user_console.php');
			}
		}
		else
		{
			echo "email already used";
		}
			
			mysqli_close($conn);
	}
?>