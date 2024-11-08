<?php
declare(strict_types=1);
/*
ЗАДАНИЕ 1
- Установите константу для хранения имени файла
- Проверьте, отправлялась ли форма и корректно ли отправлены данные из формы
- В случае, если форма была отправлена, отфильтруйте полученные значения 
  с помощью функций trim(), htmlspecialchars()
- Сформируйте строку для записи с файл
- Откройте соединение с файлом и запишите в него сформированную строку
- Используя функцию header() выполните перезапрос текущей страницы 
  (чтобы избавиться от данных, отправленных методом POST)
*/

const FILE_NAME = 'books.txt';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstName = !empty($_POST["fname"]) ? htmlspecialchars(trim($_POST['fname'])) : '';
    $lastName = !empty($_POST["lname"]) ? htmlspecialchars(trim($_POST['lname'])) : '';
    $strForFile = "$firstName $lastName\n";
    file_put_contents(FILE_NAME, $strForFile, FILE_APPEND);
    header('Location:'. $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">

Имя: <input type="text" name="fname"><br>
Фамилия: <input type="text" name="lname"><br>

<br>

<input type="submit" value="Отправить!">

</form>

<?php
/*
ЗАДАНИЕ 2
- Проверьте, существует ли файл с информацией о пользователях
- Если файл существует, получите все содержимое файла в виде массива строк 
  с помощью функции file()
- В цикле выведите все строки данного файла с порядковым номером строки
- После этого выведите размер файла в байтах.
*/


if(file_exists(FILE_NAME))
    { 
        $inFile = file(FILE_NAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
        echo '<br>';
        foreach ($inFile as $key => $value) {
            echo ($key+1) . '). ' . $value . '<br>';
        }
        echo '<br>Размер файла ' . FILE_NAME . ': ' . filesize(FILE_NAME) . ' байт';
}

?>

</body>
</html>