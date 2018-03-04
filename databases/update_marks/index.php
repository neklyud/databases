<?php
session_start();
if(isset($_GET['g_ind'])){
	$_SESSION['return']=$_GET['g_ind'];
}
if(isset($_SESSION['auth']) == 1){
		$pas=$_SESSION['role'];
		$log=$_SESSION['role'];
		$g_id=$_GET['g_ind'];
		$params=array(':chosen_group'=>$g_id);
		include '../includes/dbconnect.php';
		if (!isset($_GET['out'])){
			$sql="Select protocol_string.ps_id,student.Record_book_num, Birthday, Group_name, Last_Name, subject, project.thema, mark FROM student JOIN protocol_string USING(Record_book_num)
				JOIN project USING(pr_id)
				Where Group_Name = :chosen_group";
			$params=array(':chosen_group'=>$g_id);
			include '../includes/select.php';
			$answer=$result->fetchAll();
			include 'students.php';
		} else {
			//echo $_GET['out'][0];
			//echo $_SESSION['arr_of_ps'][0];
			//echo $_GET['in'][0];
			$ms=$_GET['in'];
			for ($i=0; $i<count($_GET['in']); $i+=1){
					$sql="update protocol_string set mark = :sel_mark
							WHERE ps_id=:sel_ps";
					$pss = $_GET['in'][$i];
					$mrks = $_GET['out'][$i];
					$params=array(':sel_mark'=>$mrks,':sel_ps'=>$pss);
					include '../includes/select.php';
			}
		include '../includes/success.php';
		exit();
	}
} else {
	$output = 'Авторизуйтесь на портале!';
	include '../includes/error.php';
	exit();
}

?>