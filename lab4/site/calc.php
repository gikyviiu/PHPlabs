<?php

$result = null;
$num1 = null;
$num2 = null;
$operator = '+';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = $_POST['operator'];
}

if($num1 !== false && $num2 !== false){
    switch($operator){
        case '+': 
            $result = $num1 + $num2;
            break;
        case '-': 
            $result = $num1 - $num2;
            break;
        case '*': 
            $result = $num1 * $num2;
            break;
        case '/': 
            if($num2 == 0) $result = "На ноль делить нельзя!";
            else $result = $num1 / $num2;
            break;
        default:
            echo 'Неккоректный оператор';
    }
} else $result = 'Введите корректные значения';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Калькулятор</title>
</head>
<body>

<h1>Калькулятор</h1>

<?php

if($result != null) echo "Результат: $num1 $operator $num2 = $result" . '<hr>';
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" selected >+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" required></p>

<button type="submit">Считать-></button>

</form>

</body>
</html>