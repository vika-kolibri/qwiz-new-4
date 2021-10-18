<?php
session_start();
	require_once('lib/require_class.php');
	require_once('lib/query_model.php');
	require_once ('lib/db_connect.php');
	$connect=new db_connect;
	$connect=$connect->connect();
	if (!$connect){
		echo 'Ошибка';			
		exit;
	} else {
		$_SESSION['quiz']=$_POST['quiz'];
		$options=new model;
		$title=$options->selectTitle($connect, '8');
		$question=$options->selectQuestion($connect, '2');
		$answers=$options->selectAnswers($connect, '2');
		$header->content($title);
		$body->quizContent($question, $answers, 'last.php', '80', '20');
		//var_dump ($_SESSION);		
		$footer->content();
	}
?>