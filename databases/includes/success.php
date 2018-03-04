<?php
session_start();
//header('Content-Type: text/html; charset=utf-8');
echo $_SESSION['return'];
?>
<html> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../Stylesheets/req1style.css">
</head>
<body>
<body bgcolor = #DEE9F9>
	<h2 align = center>   <!-- Крупный заголовок -->
	<br>
	<?php
		echo "Успех"?>
	</h2> <br>	
		<div align=center>
			<a href="./index.php?g_ind=<?php echo $_SESSION['return'];?>" ><button>Назад</button></a><br><br>
			<a href="../main_page/"><button>На главную</button></a>

		</div>
	<hr size=2 width=90% color = blue>   <!-- Линия подчеркивания -->
</body> 
</html>