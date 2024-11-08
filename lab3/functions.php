<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Функции PHP</title>
</head>

<body>
	<h3>Функции PHP</h3>
	<pre>
<?php
$extensions = get_loaded_extensions();
foreach ($extensions as $extension) {
    echo $extension;
    print_r(get_extension_funcs($extension));
	echo '<br>';
}
?>
</pre>
</body>

</html>