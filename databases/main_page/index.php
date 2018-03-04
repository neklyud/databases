<?php
session_start();
if (isset($_SESSION['auth']) == 1){
	if (isset($_GET['exit'])){
		session_destroy();
		header('Location:../authorization/');
	} else {
	$sel='select';
	for ($x=1;$x<7;$x++)
		$sel='select'.(string)$x.'.php';
		if (isset($_GET[$sel])){
			header('Location:../requests/$sel');
			exit();
		}
	}
} else {
	$output = 'Авторизуйтесь на портале!';
	include '../includes/error.php';
	exit();
}
include 'main_page.php';
?>