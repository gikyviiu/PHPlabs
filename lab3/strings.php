<?php
declare(strict_types=1);

$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>'
	
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>

<?php
function isDifficultPass($password){
	return preg_match('/[A-Z]/', $password) &&
			preg_match('/[a-z]/', $password) &&
			preg_match('/[0-9]/', $password) && 
			strlen($password) >= 8;
}



$login = strtolower(trim($login));
$passIsValid = isDifficultPass($password) ? 'Сложный пароль' : 'Уязвимый пароль';
$name = mb_convert_case($name, MB_CASE_TITLE, 'UTF-8');
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email корректный' : 'email некорректный';

?>

<p>Логин: <?= $login ?></p>
<p>Проверка пароля: <?= $passIsValid ?></p>
<p>Имя: <?= $name ?></p>
<p>Email: <?= $emailValid ?></p>
<p>Code: <?= htmlspecialchars($code) ?></p>

</body>
</html>