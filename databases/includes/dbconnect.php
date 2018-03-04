<?php
try{
	$pdo=new PDO('mysql:host=localhost;dbname=study_projects',$log,$pas);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e){
	$output = 'Ошибка соединения с базой данных '.$e->getMessage();
	include 'error.php';
	exit();
}?>