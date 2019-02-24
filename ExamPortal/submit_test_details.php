<?php

	session_start();

	$conn = mysqli_connect('localhost', 'root', '', 'ExamPortalDb');

	if (!$conn) {
    	die('Could not connect: ' . mysqli_error($conn));
	}

		$total_score = ($_GET['q']);
		//$total_score = 10;
		$email = 'rg54622@gmail.com';

		$query = "UPDATE Student SET total_score = '$total_score' WHERE email = '$email' ";

		$result = mysqli_query($conn, $query);

		if($result) echo "your result was saved successfully...";

		else echo "your result was not saved...";

?>