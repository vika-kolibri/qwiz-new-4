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
		$resultArray=@array_merge($_SESSION['quiz'], $_POST['quiz']);
		$arraySum=@array_sum($resultArray);		
		$options=new model;
		$title=$options->selectTitle($connect, '9');
		$messengers=$options->selectMessengers($connect);
		//$buttonText=$options->selectButtonText($connect, '4');
		$header->content($title);
		$body->lastContent($messengers, '98');		
		var_dump($resultArray);
		var_dump($arraySum);		
		$footer->content();
	}
?>