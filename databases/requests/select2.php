<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Stylesheets/req1style.css">
</head>
<body>
<?php
$subj = $_GET['c_subj'];
$select_id = 2;
$pas=$_SESSION['role'];
$log=$_SESSION['role'];
include '../includes/dbconnect.php';
$sql = "SELECT pr_id, thema, Record_book_num, Last_name FROM project JOIN student USING(Record_book_num) WHERE subject = :subj";
try {
	$result = $pdo->prepare($sql);
	$result->execute(array(':subj' => $subj));
}
catch(PDOException $e) {
	echo "Ошибка при извлечении данных " . $e -> GetMessage();
	exit();
}
$answer = $result -> fetchAll();
if ($result->rowCount() == 0){
	$output = 'Данных не найдено';
	include '../includes/error.php';
	exit();
}
echo "<h1>Результаты запроса</h1>";
?>
<table border=1 align=center width=80%>
	<thead>
		<tr>
			<td>ID проекта</td>
			<td>Тема</td>
			<td>Номер зачётной книжки</td>
			<td>Фамилия студента</td>
		</tr>
	</thead>
	<?php foreach ($answer as $line): ?>
		<tr> 
			<?php echo "<td>$line[pr_id]</td>";
				echo "<td>$line[thema]</td>";
				echo "<td>$line[Record_book_num]</td>";
				echo "<td>$line[Last_name]</td>";
?>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>
<?php exit(); ?>

?>