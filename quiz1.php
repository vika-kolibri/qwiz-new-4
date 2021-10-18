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
		$options=new model;
		$title=$options->selectTitle($connect, '8');
		$question=$options->selectQuestion($connect, '1');
		$answers=$options->selectAnswers($connect, '1');
		$header->content($title);
		$body->quizContent($question, $answers, 'quiz2.php', '40', '10');
		//var_dump ($_SESSION);		
		$footer->content();
	}
?>