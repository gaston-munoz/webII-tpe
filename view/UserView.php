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
        $this->smarty->assign('isAdmin',  $this->auth->isLoggedAsAdmin());
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/user/login.tpl');
    }

    function showAccount() {
       $user = $_SESSION['name'];
       $this->smarty->assign('user', $user);
       $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
       $this->smarty->assign('session', $this->auth->isLoggedIn());
       $this->smarty->assign('title', 'Bienvenido '. $user);
       $this->smarty->display('templates/user/account.tpl');
    }

    // showRegistry

    function showRegistry($message) {
        $this->smarty->assign('title', 'Cree su cuenta');
        $this->smarty->assign('message', $message);
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/user/registry.tpl');
    }

    
    function showUsers($users) {
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('users', $users);
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/user/listUsers.tpl');
    }


}

