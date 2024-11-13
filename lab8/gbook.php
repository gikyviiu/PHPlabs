<?php
declare(strict_types=1);

require_once 'config.php'; 
$connection = mysqli_connect($host, $user, $password, $db);


if (!$connection)
  die("Ошибка подключения: " . mysqli_connect_error());

mysqli_set_charset($connection, "utf8");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['name'] ?? '')));
  $email = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email'] ?? '')));
  $msg = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['msg'] ?? '')));

  // msgs insertion
  $query = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";

  if (mysqli_query($connection, $query)) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } else 
    echo "Ошибка: " . mysqli_error($connection);
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