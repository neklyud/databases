<?php
error_reporting(-1);
//header('Content-Type: text/html; charset=utf-8');
?>
<html> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../Stylesheets/req1style.css">
</head>
<body>
	<h2 align = center>   <!-- Крупный заголовок -->
	<br>
	<?php
		echo "$output;"?>
	</h2> <br>	
	<form action="?" method="get">
		<div align=center>
			<input style="width: 254px;" type=submit name=return value='Назад'><br>
		</div>
	<hr size=2 width=90% color = blue>   <!-- Линия подчеркивания -->
</body> 
</html>