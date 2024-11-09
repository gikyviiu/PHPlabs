<?php
declare(strict_types=1);
// require_once('Classes/User.php');
// require_once('Classes/SuperUser.php');
function autoLoader($class) {
    $file = str_replace('\\', '/', $class).'.php';
    if (file_exists($file))
        require $file;
}
spl_autoload_register('autoLoader');
use Classes as C;

$user1 = new C\User();
$user1->name = 'user1';
$user1->login = 'u1login';
$user1->password = 'u1pass';

$user2 = new C\User();
$user2->name = 'user2';
$user2->login = 'u2login';
$user1->password = 'u2pass';

$user3 = new C\User();
$user3->name = 'user3';
$user3->login = 'u3login';
$user3->password = 'u3pass';

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

echo "<br>";

$user11 = new C\User('имя1', 'логин1', 'пароль1');
$user22 = new C\User('имя2', 'логин2', 'пароль2');
$user33 = new C\User('имя3', 'логин3', 'пароль3');

$user11->showInfo();
$user22->showInfo();
$user33->showInfo();

echo "<br>";

$user = new C\SuperUser('суперюзер', 'суперлогин', 'пароль12124', 'админ');
$user->showInfo();
?>