<?php
try {
	$result = $pdo->prepare($sql);
	$result->execute($params);
}
catch(PDOException $e) {
	echo "Ошибка при извлечении данных " . $e -> GetMessage();
	exit();
}
?>