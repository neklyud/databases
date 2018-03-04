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
$select_id = 3;
$pas=$_SESSION['role'];
$log=$_SESSION['role'];
include '../includes/dbconnect.php';
$sql = "SELECT t_id, last_name, Birthdate, Pulpit_num, St_work_date FROM teachers LEFT JOIN project USING(t_id) WHERE pr_id IS NULL";
try {
	$result = $pdo->prepare($sql);
	$result->execute();
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
			<td>ID преподавателя</td>
			<td>Фамилия преподавателя</td>
			<td>Дата рождения преподавателя</td>
			<td>Номер кафедры</td>
			<td>Дата начала работы</td>
		</tr>
	</thead>
	<?php foreach ($answer as $line): ?>
		<tr> 
			<?php echo "<td>$line[t_id]</td>";
				echo "<td>$line[last_name]</td>";
				echo "<td>$line[Birthdate]</td>";
				echo "<td>$line[Pulpit_num]</td>";
				echo "<td>$line[St_work_date]</td>";
?>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>
<?php exit(); ?>

?>