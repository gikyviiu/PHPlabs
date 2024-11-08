<?php
declare(strict_types=1);

function getTable(int $cols = 7, int $rows = 7, string $color = 'orange'): int
{
	static $count = 0;
	$count++;
	$table = '<table>';
	for ($i = 1; $i <= $cols; $i++) {
		$table .= '<tr>';
		for ($j = 1; $j <= $rows; $j++) {
			if ($i == 1 || $j == 1) {
				$table .= '<th style="background-color:' . $color . ';">' . $i * $j . '</th>';
			} else {
				$table .= '<td>' . $i * $j . '</td>';
			}
		}
		$table .= '</tr>';
	}
	$table .= '</table>';
	echo $table;
	return $count;
}

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

    getTable(9, 9, 'pink');
    echo '<br>';
    getTable(5, 8, 'green');
    echo '<br>';

    getTable();
	echo '<br>';

	getTable(4);
	echo '<br>';

	$count = getTable(3, 3);

	echo '<br> ' . "Количество вызовов ф-ции getTable() = " . $count;
	
	?> 
</body>
</html>