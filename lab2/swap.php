<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Функция swap</title>
</head>

<body>
    <h1>Функция swap</h1>
    <?php
    function swap(&$a, &$b) {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }
    
    $a = 5;
    $b = 8;
    
    swap($a, $b);
    
    echo '$a = ' . $a . "\n"; 
    echo '$b = ' . $b . "\n"; 
    ?>
</body>

</html>