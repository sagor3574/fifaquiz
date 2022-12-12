<?php 
include "db.php";
date_default_timezone_set('Asia/Dhaka');

session_start();
$question = mysqli_real_escape_string($conn,$_POST['question']);
$option1 = mysqli_real_escape_string($conn,$_POST['option1']);
$option2 = mysqli_real_escape_string($conn,$_POST['option2']);
$option3 = mysqli_real_escape_string($conn,$_POST['option3']);
$option4 = mysqli_real_escape_string($conn,$_POST['option4']);
$correct = mysqli_real_escape_string($conn,$_POST['correct']);
$date = date("d M, Y h:i A");

$sql = "INSERT INTO question_list (question,option1,option2,option3,option4,correct,qst_date) VALUES ('{$question}', '{$option1}','{$option2}','{$option3}','{$option4}', '{$correct}', '{$date}');";

if(mysqli_query($conn,$sql)){
	header("Location: {$hostname}/quiz.php");
}
else{
	echo"<div class='alert alert-danger'>Query Failed.</div>";
}
?>