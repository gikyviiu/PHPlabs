<?php
include('inc/lib.inc.php');
include('inc/data.inc.php');

// Инициализация заголовков страницы
$title = 'Сайт нашей школы';
ob_start();//перенаправим вывод в буфер, потом его очистим
include('/home/f1041946/domains/f1041946.xsph.ru/public_html/lab3/date.php');
ob_end_clean();
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'] ?? '')));
switch ($id) {
  case 'about':
    $title = 'О сайте';
    $header = 'О нашем сайте';
    break;
  case 'contact':
    $title = 'Контакты';
    $header = 'Обратная связь';
    break;
  case 'table':
    $title = 'Таблица умножения';
    $header = 'Таблица умножения';
    break;
  case 'calc':
    $title = 'Он-лайн калькулятор';
    $header = 'Калькулятор';
    break;
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php include('inc/top.inc.php'); ?>
    <!-- Верхняя часть страницы -->
  </header>

  <section>
    <!-- Заголовок -->
    <h1><?= $header ?></h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <?php
    switch ($id) {
      case 'about':
        include 'about.php';
        break;
      case 'contact':
        include 'contact.php';
        break;
      case 'table':
        include 'tables.php';
        break;
      case 'calc':
        include 'calc.php';
        break;
      default:
        include 'inc/index.inc.php';
    }
    ?>
    <!-- Область основного контента -->
  </section>
  <nav>
    <!-- Навигация -->
    <?php include('inc/menu.inc.php'); ?>
    <?php getMenu($leftMenu); ?>
    <!-- Навигация -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    <?php include('inc/bottom.inc.php'); ?>
    <!-- Нижняя часть страницы -->
  </footer>
</body>
</html>