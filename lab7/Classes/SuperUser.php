<?php declare(strict_types=1); 
namespace Classes;
require_once 'User.php';

class SuperUser extends User {
    public $role;

    /**
     * Summary of __construct
     * @param mixed $name
     * @param mixed $login
     * @param mixed $password
     * @param mixed $role
     */
    public function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    /**
     * Summary of showInfo
     * @return void
     */
    public function showInfo() {
        parent::showInfo();
        echo " Роль: $this->role";
    }
}
?>