<?php

$visits = 0;
if(isset($_COOKIE['visits'])){
  $visits = (int)$_COOKIE['visits'];
}
$visits += 1;

$lastVisit = '';
if(isset($_COOKIE['lastVisit'])){
    $lastVisit = htmlspecialchars(trim($_COOKIE['lastVisit']));
}
setcookie('lastVisit', date('d-m-Y H:i:s'), time()+(60*60*24));
setcookie('visits', $visits, time() + (60 * 60 * 24));

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Последний визит</title>
</head>
<body>

<h1>Последний визит</h1>

<?php

if($visits > 1){
  echo "Вы зашли на страницу $visits раз <br>";
}
else {
  echo 'Добро пожаловать! <br>';
}
echo "Последнее посещение: $lastVisit <br>";

?>

</body>
</html>