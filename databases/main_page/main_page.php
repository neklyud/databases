<?php
session_start();
echo $_SESSION['log'];
?>
<html> 
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Stylesheets/req1style.css">
	<script src="main.js"></script>
	<script src="script.js"></script>
</head>
<body bgcolor = #DEE9F9>
<table border=0 width=100%> 
<td height=30% id="my_table">
<p align=center><img height= 7%  src="../Img/Gerb_MGTU_imeni_Baumana.png"/></p>
</td>
<td height=30% id="my_table">
<h1 align = center><font face="Arial" color=#A66800>
Учебные проекты
</h1></font> <br> 
</td>
<td height=30% id="my_table">
	<button class="butt" name="submit"  onclick="if(confirm('Вы уверены?')){document.location.replace('?exit');}">Выход</button>
</td>

</table>
<br> 
<div class="popup" onclick="myFunction()">
<table class=table border=0 width=100% text_align=center>
<tbody>

<tr>
<td align=center>
	<input class="but" type="submit" value="Запрос 1" onclick="showBlock('select1');">
	<div id="select1" style="display: none;">
    <form action="../requests/select1.php" method="GET" name="select1">
		<p><label>Ведомость группы по дисциплине</label>
			<input class="texti" name="c_year" required type="text" pattern="[1-9][0-9]{3}" placeholder="2018">
			<input class="texti" name="g_index" required type="text" pattern ="[az-Az]-[0-9]" placeholder="RK6-41">
		</p>
		<input class="but" type="submit" value="Выполнить">
		<input class="but" type="reset" value="Сброс">
		<input type="hidden" name="action" value="Req1">
	</form>
	</div>
	</td><td align=center>
	<input class="but" type="submit" value="Запрос 2" onclick="showBlock('select2');">
	<div id="select2" style="display: none;">
	<form action="../requests/select2.php" method="GET" name="select2">
		<p><label>Составить отчёт о проектах по дисциплине. Выберете название предмета: </label>
		<select class="quali" name="c_subj">
			<option value="Физика">Физика</option>
			<option value="Химия">Химия</option>
			<option value="Математика">Математика</option>
			<option value="Статистика">Статистика</option>
			<option value="Статистика">Начертательная геометрия</option>
			<option value="Статистика">Базы данных</option>
		</select></p></p>
		<input class="but" type="submit" value="Выполнить">
		<input class="but" type="reset" value="Сброс">
		<input type="hidden" name="action" value="Req2">
	</form>
	</div>
	</td>
	
<td align=center>
	<input class="but" type="submit" value="Запрос 3" onclick="showBlock('select3');">
	<div id="select3" style="display: none;">
	<form action="../requests/select3.php" method="GET" name="select3">
	<p><label>Показать все сведения о самом молодом преподавателе</label></p>
	<input class="but" type="submit" value="Выполнить">
	</form>
	</div>
	</td>
</tr>
<tr>
<td align=center>
	<input class="but" type="submit" value="Запрос 4" onclick="showBlock('select4');">
	<div id="select4" style="display: none;">
	<form action="../requests/select4.php" method="GET" name="select4">
	<p><label>Показать все сведения о преподавателях, которые не вели ни одного проекта</label></p>
	<input class="but" type="submit" value="Выполнить">
	</form>
	</div>
	</td>
<td align=center>
	<input class="but" type="submit" value="Запрос 5" onclick="showBlock('select5');">
	<div id="select5" style="display: none;">
    <form action="../requests/select5.php" method="GET" name="select5">
		<p><label>Преподаватели без проектов в заданном году. Введите год в формате ГГГГ: </label><input class="texti" name="c_year" required type="text" pattern="[1-9][0-9]{3}" placeholder="2018"></p>
		<input class="but" type="submit" value="Выполнить">
		<input class="but" type="reset" value="Сброс">
	</form>
	</div>
</td>
<td align=center>
	<input class="but" type="submit" value="Запрос 6" onclick="showBlock('select6');">
	<div id="select6" style="display: none;">
	<form action="../requests/select6.php" method="GET" name="select6">
	<p><label>Показать все сведения о преподавателе, который вёл больше всех студентов</label></p>
	<input class="but" type="submit" value="Выполнить">
	</form>
	</div>
	</td>
</tr>
</div>
</tbody>
</table>
</div>

</div>
<?php 
if($_SESSION['role']=='operator'){?>
<div>
	<input class="butt" type="submit" value="Занести оценки" onclick="showBlock('mark');">
	<div id="mark" style="display: none;">
    <form action="../update_marks/" method="GET" name="mark">
		<p><label>Введите индекс группы</label>
			<input class="texti" name="g_ind" required type="text" pattern ="[az-Az]-[0-9]" placeholder="RK6-41">
			<input name="rights" required type="hidden">
		</p>
		<input class="but" type="submit" value="Выполнить">
		<input class="but" type="reset" value="Сброс">
		<!--<input type="hidden" name="action" value="Req1">-->
	</form>
	</div>
</div>
<?php
}
if($_SESSION['role']=='operator' or $_SESSION['role']=='teacher'){?>
<div>
	<input class="butt" type="submit" value="Получить ведомость" onclick="showBlock('ved');">
	<div id="ved" style="display: none;">
    <form action="../empty/" method="GET" name="ved">
		<p><label>Введите индекс группы</label>
			<input class="texti" name="g_ind" required type="text" pattern ="[az-Az]-[0-9]" placeholder="RK6-41">
		</p>
		<input class="but" type="submit" value="Выполнить">
		<input class="but" type="reset" value="Сброс">
		<input type="hidden" name="action" value="Req1">
	</form>
	</div>
</div>
<?php 
}?>

<!--<div>
	<input class="butt" type="submit" value="Получить ведомость" onclick="showBlock('mark');">
	<div id="mark" style="display: none;">
    <form action="../update_marks/mark.php" method="GET" name="mark">
		<p><label>Введите индекс группы</label>
			<input class="texti" name="g_index" required type="text" pattern ="[az-Az]-[0-9]" placeholder="RK6-41">
		</p>
		<input class="but" type="submit" value="Выполнить">
		<input class="but" type="reset" value="Сброс">
		<input type="hidden" name="action" value="Req1">
	</form>
	</div>
</div>-->

<!--<?php 
if($_SESSION['role']=='teacher'){
?>
<div> 
<input class="butt" type="submit" value="Отчет" onclick="showBlock('otc');">
		<div id="otc" style="display: none;">
			<p>Занести в отчёт о сдаче предмета в году по форме: ID преподавателя, предмет, группа, средняя оценка, год</p> 
			<form action="../proc/procedure.php" method="GET" name="otc"> 
			<p><label>Введите год в формате ГГГГ: </label><input class="texti" name="YP" required type="text" pattern="[1-9][0-9]{3}" placeholder="2017"></p> 
			<p><label>Выберете название предмета: </label><select class="quali" name="SP">
						<option value="Физика">Физика</option>
						<option value="Химия">Химия</option>
						<option value="Математика">Математика</option>
						<option value="Статистика">Статистика</option>
						<option value="Статистика">Начертательная геометрия</option>
						<option value="Статистика">Базы данныъ</option>
					</select></p>
					</p> 
			<input class="but" type="reset" value="Очистить"> 
			<input class="but" type="submit" value="Выполнить"> 
			</form> 
			<form action="../proc/check.php" method="GET" onsubmit="show('block')"> 
			<input class="but" type="submit" name="check" value="Вывести отчет"> 
			</form> 
		</div>
</div>
<?php 
}?>-->
</div>
</body> 
</html>
