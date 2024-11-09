<?php declare(strict_types=1);
namespace Classes;

class User {
    public $name;
    public $login;
    private $password;
    
    public function __construct($name=null, $login=null, $password=null) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public function __destruct() {
        echo "<br>Пользователь {$this->login} удален.";
    }
    
    function showInfo() {
        echo "<br>Имя: $this->name Логин: $this->login";
    }
}
?>