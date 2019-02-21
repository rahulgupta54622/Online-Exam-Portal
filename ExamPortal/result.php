<?php
	
	
	$conn = mysqli_connect('localhost', 'root', '', 'ExamPortalDb');
	$MyQuestionData = new \stdClass();

	if (!$conn) {
    	die('Could not connect: ' . mysqli_error($conn));
	}


	$query = "SELECT * FROM Questions";


	$result = mysqli_query($conn, $query);

	$num_rows = mysqli_num_rows($result);



	
	class Question
	{
		var $question_statement;
		var $option_a;
		var $option_b;
		var $option_c;
		var $option_d;
		var $correct_option;

	}

	$questions_object_array = array();
	$row = mysqli_fetch_assoc($result);
	while ($row != NULL) {
		
		$question = new Question();

		//echo $row['question_statement'];

		$question->question_statement = $row['question_statement'];
		$question->option_a = $row['option_a'];
		$question->option_b = $row['option_b'];
		$question->option_c = $row['option_c'];
		$question->option_d = $row['option_d'];
		$question->correct_option = $row['correct_option'];

		$questions_object_array[] =  $question;

		$row = mysqli_fetch_assoc($result);
	}

	echo json_encode($questions_object_array);
?>