<?php
declare(strict_types=1);

$now = time();
$birthday = mktime(2, 30, 0, 10, 9, (int) date('Y'));
$hour = getdate()['hours'];
	
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	if ($hour >= 0 && $hour < 6)
	$welcome = 'Доброй ночи';
elseif ($hour >= 6 && $hour < 12)
	$welcome = 'Доброе утро';
elseif ($hour >= 12 && $hour < 18)
	$welcome = 'Добрый день';
elseif ($hour >= 18 && $hour < 23)
	$welcome = 'Добрый вечер';
else $welcome = 'Доброй ночи';
echo '<br>' . $welcome . '<br>';

setlocale(LC_ALL, 'ru_RU.UTF-8');


$fmt = datefmt_create(
	null,
	IntlDateFormatter::FULL,
	IntlDateFormatter::FULL,
	'Europe/Moscow',
	IntlDateFormatter::GREGORIAN,
	'dd MMMM yyyy года, EEEE HH:mm:ss'
);

echo 'Текущая дата:' . datefmt_format($fmt, $now) . '<br>';

$birthdayItem = getdate($birthday);

if($birthday < $now){
	$birthday = mktime(
		$birthdayItem['hours'], 
		$birthdayItem['minutes'], 
		$birthdayItem['seconds'], 
		$birthdayItem['mon'], 
		$birthdayItem['mday'], 
		(int)date('Y') + 1,
	);
}

$diff = $birthday - $now;

$day = floor($diff / ((60 * 60 * 24)));
$diff %= 60 * 60 * 24;
$hours = floor($diff / (60 * 60));
$diff %= 60 * 60;
$minutes = floor($diff / 60);
$seconds = $diff % 60;

echo 'До моего дня рождения осталось: ' . $day . ' дней, ' . $hours .' часов, '. $minutes .' минут, '. $seconds . ' секунд';




	?>
</body>
</html>