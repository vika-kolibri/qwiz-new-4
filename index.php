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
		$title=$options->selectTitle($connect, '2');
		$bullits=$options->selectBullits($connect, 'index');
		$buttonText=$options->selectButtonText($connect, '4');
		$header->content($title);
		$body->indexContent($bullits, $buttonText);		
		$footer->content();
	}
?>