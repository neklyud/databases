<?php
session_start();
if(isset($_POST['entrance'])){
	$log = 'knowner';
	$pas = 'knowner';
	include '../includes/dbconnect.php';
	$login=$_POST['login'];
	$password=$_POST['passwd'];
	try{//поиск пользователя
		$sql="SELECT * FROM all_users WHERE login='$login' AND passwd='$password'";
		$s=$pdo->query($sql);
	}
	catch(PDOException $e){
		$output='Ошбика при извлечении данных'.$e->getMessage();
		include '../includes/error.php';
		exit();
	}
	$row=$s->fetch();
	if($row['passwd']!=$password and $row['login']!=$login){
		$output = "Такого пользователя не существует. Повторите вход";
		include '../includes/error.php';
		exit();
	}
	$log=$row['user_group'];
	$pas=$log;
	$pdo=null;	
	include $_SERVER['DOCUMENT_ROOT'].'/site.ru/includes/dbconnect.php';
	$_SESSION['role']=$row['user_group'];
	$_SESSION['pasword']=$row['passwd'];
	$_SESSION['login']=$row['login'];
	$_SESSION['auth']=1;
	header('Location:../main_page/');
	exit();
} elseif (!isset($_POST['entrance'])) {
	include 'auth_form.html';
	exit();
}
?>