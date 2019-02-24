<?php
 	session_start();

 	if(!isset($_SESSION["username"])){

        header("Location: front.php");
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>USER CONSOLE</title>
	<style type="text/css">
		body{
			background-color: cyan;
		}
		.username{
			position: absolute;
			margin-left: 75%;
			font-family:"Impact", "Charcoal", "sans-serif" ;
			font-size: 20px;
			color: #aab8bf;
		}

		#logout{
			position: absolute;
			background-color: #0f8ea2;
			color: #1f291b;
			margin-top: 10px;
			margin-left: 50%;
			align-items: center;
			font-size: 20px;
			font-family:"Impact", "Charcoal", "sans-serif" ;
			-webkit-transition-duration: 0.4s; /* Safari */
  			transition-duration: 0.4s;
		}
		#logout:hover {
			background-color:#1f291b ;
			color: #0f8ea2;
		}

		.test_details{

			  box-shadow: 0 4px 8px 0 #03a9fa;
			  transition: 0.3s;
			  width: 40%;
			  border-radius: 5px;
			  background-color: #38a9a2;

			color: black;
			position: absolute;
			margin-top: 150px;
			
			text-align: center;
			margin-left: 420px;
			font-family: Arial, Helvetica, "sans-serif";
		}

		#attempt{
			position: absolute;
			top: 130%;
			left:50%;
			transform: translate(-50%,-50%);
			width: 200px;
			height: 60px;
			text-align: center;
			line-height: 60px;
			color: #fff;
			font-size: 24px;
			text-decoration: none;
			font-family: sans-serif;
			box-sizing: border-box;
			background:linear-gradient(90deg, #03a9fa, #f441a5, #ffeb3a, #03a9fa);
			background-size: 400%;
			border-radius: 30px;
			z-index: 1;
		}

		#attempt:hover{
			animation: animate 1s linear infinite;
		}

		@keyframes animate
		{
			0%
			{
				background-position: 0%;
			}
			100%
			{
				background-position: 400%;
			}
		}

		#attempt:before
		{
			content: '';
			position: absolute;
			top: -5px;
			left: -5px;
			right: -5px;
			bottom: -5px;
			z-index: -1;
			background:linear-gradient(90deg, #03a9fa, #f441a5, #ffeb3a, #03a9fa);
			border-radius: 40px;
			opacity: 0;
			transition: 0.5s;
		}

		#attempt:hover:before
		{
			filter: blur(20px);
			opacity: 1;
			animation: animate 5s linear infinite;
		}

		#info{
			text-decoration: none;
			color: #aab8bf;
		}

	</style>

</head>
<body>
	<div class="username">
    <?php
    	
        echo "<a href=profile_info.php id = 'info'>" ."Hello ". $_SESSION["username"] . "</a>";
    ?>
    <br>
    <a href="logout.php"><button id="logout">LOGOUT</button></a>
    </div>

	<?php 
		$host = "localhost";
				$dbUsername = "root";
				$dbPassword = "";
				$dbName = "login_details";

				$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

								// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT * FROM description";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        $_SESSION["time"] = $row["time"];
				        $_SESSION["description"] = $row["description"];
				        $_SESSION["marks"] = $row["marks"];
				    }
				} else {
				    echo "0 results";
				}
				$conn->close();

	?>
	<div class="test_details">
		<h3 align="center">GENERAL INSTRUCTIONS</h3>
		<?php
			echo $_SESSION["description"] ."<br>"."<br>";
			echo "TEST DURATION : ". $_SESSION["time"] ."<br>"."<br>";
			echo "TOTAL MARKS : ". $_SESSION["marks"] ."<br>"."<br>";

		?>
		<br>
		<br>
		<br>
		<br>
		<a id="attempt" href="/ExamPortal/takeTest.php">ATTEMPT</a>
	</div>

</body>
</html>