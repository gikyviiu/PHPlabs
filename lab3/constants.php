<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы PHP</title>
</head>

<body>
	<h3>Константы PHP</h3>
	<pre>
	<?php
        print_r(get_defined_constants(true));
	?>
	</pre>
</body>

</html>