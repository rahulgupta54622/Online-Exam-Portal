<?php
	// foreach ($_POST as $value) {
 //   		 echo "$value <br>";
	// }
	$count = count($_POST)/6;

	print_r($_POST["q0"]);
	echo "$count";

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
		echo "connected in add_question.php";
		for($i = 0; $i<$count; $i++)
		{	

			print_r($_POST);

			$q = $_POST["q".$i];
			echo "$q<br>";
			$a = $_POST["a".$i];
			print_r($a);
			$b = $_POST["b".$i];
			print_r($b);
			$c = $_POST["c".$i];
			print_r($c);
			$d = $_POST["d".$i];
			print_r($d);
			$ans = $_POST["ans".$i];
			print_r($ans);

$INSERT = "INSERT INTO questions VALUES ('$q','$a','$b','$c','$d','$ans')";
				if (mysqli_query($conn, $INSERT)) {
				    echo "New record created successfully";
				} 
				else
				{
				    echo "Error: " . $INSERT . "<br>" . mysqli_error($conn);
				}
		}

// 		mysqli_close($conn);
	}

?>