<?php declare(strict_types=1);
namespace Classes;

class User {
    public $name;
    public $login;
    private $password;
    

    /**
     * Summary of __construct
     * @param mixed $name
     * @param mixed $login
     * @param mixed $password
     */
    public function __construct($name=null, $login=null, $password=null) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * Summary of __destruct
     */
    public function __destruct() {
        echo "<br>Пользователь {$this->login} удален.";
    }
    
    /**
     * Summary of showInfo
     * @return void
     */
    function showInfo() {
        echo "<br>Имя: $this->name Логин: $this->login";
    }
}
?>