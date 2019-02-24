<!DOCTYPE html>
<html>
<head>
	<title>USER INFO</title>
	<style type="text/css">
		.user_info 
		{
			 
			  transition: 0.3s;
			  width: 40%;
			  border-radius: 5px;
			color: black;
			position: absolute;
			margin-top: 150px;
			margin-left: 500px;
			font-family: sans-serif;
		}
		body
		{
			background-color: #29cb8e;
		}
	</style>
</head>

<body>

</body>
</html>

<?php 
		session_start();
		$email=$_SESSION["username"];
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "login_details";

		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

						// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM details WHERE email = '$email'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		        echo "<div class='user_info'>". "<h3>"."USER INFO". "</h3>". "Name : ". $row['Name'] ."<br>". "Email : ". $row["Email"]."<br>" . "Password : ".$row["Password"]."<br>" ."Mobile : ".$row["Mobile"]."<br>" . "DOB : ". $row["DOB"]."<br>" . "ROll : ".$row["Roll"]. "<br>". "Branch : ".$row["Branch"]."<br>" ."CGPA : ".$row["CGPA"]. "<br>"."SGPA : ".$row["SGPA"]. "<br>"."Tenth : ".$row["Tenth"]. "<br>"."Twelth : ".$row["Twelth"]. "</div>";


		    }
		} else {
		    echo "0 results";
		}
		$conn->close();
?>