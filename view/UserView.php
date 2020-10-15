<?php
require_once "./libs/smarty/Smarty.class.php";

class UserView {

    private $title;
    private $smarty;
    private $auth;

    function __construct() {
        $this->smarty = new Smarty();
        $this->auth = new Auth();

    }

    function showLogin($message) {
        $this->smarty->assign('title', 'Administrador');
        $this->smarty->assign('message', $message);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/user/login.tpl');
    }

    function showAccount() {
       $user = $_SESSION['name'];
       $this->smarty->assign('user', $user);
       $this->smarty->assign('session', $this->auth->isLoggedIn());
       $this->smarty->assign('title', 'Bienvenido '. $user);
       $this->smarty->display('templates/user/account.tpl');
    }
}