<?php
declare(strict_types=1);
/* ЗАДАНИЕ 1
- Подключитесь к серверу MySQL, выберите базу данных
- Установите кодировку по умолчанию для текущего соединения
- 
- Проверьте, была ли корректным образом отправлена форма
- Если она была отправлена: отфильтруйте полученные данные 
  с помощью функций trim(), htmlspecialchars() и mysqli_real_escape_string(),
  сформируйте SQL-оператор на вставку данных в таблицу msgs и выполните его с помощью функции mysqli_query(). 
  После этого с помощью функции header() выполните перезапрос страницы, 
  чтобы избавиться от информации, переданной через форму
*/

/*
ЗАДАНИЕ 3
- Проверьте, был ли запрос методом GET на удаление записи
- Если он был: отфильтруйте полученные данные,
  сформируйте SQL-оператор на удаление записи и выполните его.
  После этого выполните перезапрос страницы, чтобы избавиться от информации, переданной методом GET
*/
$host = 'localhost';
$user = 'f1041946_login_db';
$password = 'ZeRNMEPB';
$dbname = 'f1041946_login_db';

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn)
    die("Connection failed: ". mysqli_connect_error());

mysqli_set_charset($conn, "utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(mysqli_real_escape_string($conn, htmlspecialchars($_POST['name'])));
    $email = trim(mysqli_real_escape_string($conn, htmlspecialchars($_POST['email'])));
    $msg = trim(mysqli_real_escape_string($conn, htmlspecialchars($_POST['msg'])));
    $query = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
    if (mysqli_query($conn, $query)) {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } 
    else
        echo "Error: ".mysqli_error($conn);
}

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $query = "DELETE FROM msgs WHERE id = $delete_id";
    if (mysqli_query($conn, $query)) {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } 
    else
        echo "Error deleting record: ".mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Ваше имя:<br>
    <input type="text" name="name" required><br>
    Ваш E-mail:<br>
    <input type="email" name="email" required><br>
    Сообщение:<br>
    <textarea name="msg" cols="50" rows="5" required></textarea><br>
    <br>
    <input type="submit" value="Добавить!">
</form>

<?php
$query = "SELECT * FROM msgs ORDER BY id DESC";
$result = mysqli_query($conn, $query);
$row_count = mysqli_num_rows($result);
echo "<p>Записей в гостевой книге: $row_count</p>";
if ($row_count > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<p><strong>Name:</strong> " . htmlspecialchars($row['name']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
        echo "<p><strong>Message:</strong> " . htmlspecialchars($row['msg']) . "</p>";
        echo "<a href='" . $_SERVER['PHP_SELF'] . "?delete_id=" . $row['id'] . "'>Delete</a>";
        echo "</div><hr>";
    }
} 
else
    echo "<p>Пока сообщений нет</p>";
    
mysqli_close($conn);
?>
</body>
</html>