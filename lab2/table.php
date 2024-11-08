<?php
declare(strict_types=1);
	
$cols = rand(1,10);
$rows = rand(1,10);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table {
			border: 2px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 10px;
			border: 1px solid black;
		}

		th {
			background-color: yellow;
		}
	</style>
</head>
<body>
	<h1>Таблица умножения</h1>
	<?php
    $table = '<table>';
	for ($i = 1; $i <= $cols; $i++) {
		$table .= '<tr>';
		for ($j = 1; $j <= $rows; $j++) {
			if ($i == 1 || $j == 1) {
				$table .= '<th>' . $i * $j . '</th>';
			} else {
				$table .= '<td>' . $i * $j . '</td>';
			}
		}
		$table .= '</tr>';
	}
	$table .= '</table>';
	echo $table;
	
	?> 
</body>
</html>