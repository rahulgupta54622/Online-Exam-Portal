<?php
session_start();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ExamPortalDb');
$MyQuestionData = new \stdClass();
if (!$db) {
    die('Could not connect: ' . mysqli_error($db));
}

$q_no_to_show = ($_GET['q']);

$query = "SELECT * FROM Questions";

$all_questions_result = mysqli_query($db, $query);

$total_questions = mysqli_num_rows($all_questions_result);

$query = "SELECT * FROM Questions WHERE question_number = '$q_no_to_show'";

$result = mysqli_query($db, $query);

$question = mysqli_fetch_assoc($result);

// echo "<p>". implode(", ", $question)."</p>" ;   //implode -- array to string seprated with ", "

$MyQuestionData->question_statement = $question['question_statement'];
$MyQuestionData->option_a = $question['option_a'];
$MyQuestionData->option_b = $question['option_b'];
$MyQuestionData->option_c = $question['option_c'];
$MyQuestionData->option_d = $question['option_d'];
$MyQuestionData->correct_option = $question['correct_option'];
$MyQuestionData->total_questions = $total_questions;



//$MyQuestionData = "{"."question_statement".":".$question['question_statement'].","."option_a".":".$question['option_a']."}";

$myJSON = json_encode($MyQuestionData);

echo $myJSON;

?>
