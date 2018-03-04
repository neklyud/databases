<?php $options = array(
	'Введите оценку',
	'Я',
	'Неуд',
	'3',
	'4',
	'5'
); ?>

<html> 
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Stylesheets/req1style.css">
</head>
<body bgcolor = #DEE9F9>
	<?php 
	$ps=array();
	?>
	<form action='' method="GET">
	<table width=80% id="table1">
	<tbody id="tb">
		<tr>
			<td align="center">Номер зачётной книжки</td>
			<td align="center">Дата рождения</td>
			<td align="center">Номер группы</td>
			<td align="center">Фамилия</td>
			<td align="center">Предмет</td>
			<td align="center">Тема</td>
			<td align="center">Оценка</td>
		</tr>
	<?php foreach ($answer as $line): ?>
		<tr> 
			<?php 
			echo "<td>$line[Record_book_num]</td>";
			echo "<td>$line[Birthday]</td>";
			echo "<td>$line[Group_name]</td>";
			echo "<td>$line[Last_Name]</td>";
			echo "<td>$line[subject]</td>";
			echo "<td>$line[thema]</td>";
			?>
			<td align='center' id='inp'>
			<input type="hidden" name="in[]" value="<?php echo $line['ps_id'] ?>">
			<select name="out[]" required > 
					<?php if($line['mark'] == null): ?>
					<option value="">Введите оценку</option>
				<?php endif; ?>
					<?php for($i = 1; $i < 6; $i++): ?>
					<option <?php 
						if ($line['mark']!=null and $line['mark']==$i){
							echo "selected ";
						}
					?> value='<?php echo $i; ?>'><?php echo $options[$i]; ?></option>	
			<?php endfor;?>
			</select>
			<?php
			array_push($ps, $line[ps_id]);
			?>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<?php $_SESSION['arr_of_ps']=$ps; ?>
	<input class="but" id="send" type="submit" value="Выполнить" onclick="confirmation()">
	</form>
	<a href="../main_page/"><input class="but" id="send" type="submit" value="На главную" onclick="confirmation()"></a>
	<script type="text/javascript">
	function sendm(ps){
		var table=document.getElementById("table1");
		var x;
		var out=[];		
		for (var r=1; r<table.rows.length; r++) {
				td6 = table.rows[r].cells[6];
				x=td6.firstChild.selectedIndex;
				td6=td6.firstChild.options[x].text;
				if (td6=="Введите оценку"){
					td6=null;
				}
				if (td6=="Неуд"){
					td6=2;
				}
				if (td6=="Я"){
					td6=1;
				}
				out.push(td6);
				document.location.href="./marks.php?out="+out;
				console.log(out);
		}
	}
	function confirmation(){
		var what = confirm("Вы уверены?");
	}
	</script>
	</body>
	</html>