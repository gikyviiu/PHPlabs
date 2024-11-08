<?php

/*
ЗАДАНИЕ 1
- Создайте переменную $name и присвойте ей значение содержащее Ваше имя, например 'Иван'(обязательно в одинарных кавычках!).
- Создайте переменную $age и присвойте ей значение содержащее Ваш возраст, например 20.
*/
$name = 'Диана';
$age = 20;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные и вывод</title>
</head>

<body>
	<h1>Переменные и вывод</h1>

	<?php
	echo "Меня зовут: $name<br>";
	echo "Мне $age лет<br>";


	echo "<br>Тип переменной name: ";
	var_dump( $name);
	echo "<br>Тип переменной age: ";
	var_dump($age);


	unset($name, $age);
	?>
</body>

</html>