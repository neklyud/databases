<?php
//Header("Content-Type: text/html;charset=UTF-8");
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
$y = $_GET['c_year'];
$g = $_GET['g_index'];
$select_id = 1;
$pas=$_SESSION['role'];
$log=$_SESSION['role'];
include '../includes/dbconnect.php';
$sql = "SELECT `project`.`Record_book_num`, `teachers`.`Last_name`, `student`.`last_name`, `project`.`thema`, `protocol_string`.`mark` FROM protocol 
		JOIN protocol_string USING(p_id)
		JOIN project USING(pr_id)
		JOIN teachers USING(t_id)
		JOIN student 
		ON project.Record_book_num = student.Record_book_num WHERE YEAR(project.finish_date) = :chosen_year AND student.Group_name = :chosen_group
		ORDER BY Record_book_num";
try {
	$result = $pdo->prepare($sql);
	$result->execute(array(':chosen_year' => $y,':chosen_group'=>$g));
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
			<td>Номер зачётки</td>
			<td>Фамилия преподавателя</td>
			<td>Фамилия студента</td>
			<td>Тема проекта</td>
			<td>Оценка</td>
		</tr>
	</thead>
	<?php foreach ($answer as $line): ?>
		<tr> 
			<?php echo "<td>$line[Record_book_num]</td>";
				echo "<td>$line[Last_name]</td>";
				echo "<td>$line[last_name]</td>";
				echo "<td>$line[thema]</td>";
				echo "<td>$line[mark]</td>";
?>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>
<?php exit(); ?>

?>