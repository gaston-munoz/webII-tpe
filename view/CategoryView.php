<?php
require_once "./libs/smarty/Smarty.class.php";

class CategoryView {
    private $title;
    private $smarty;
    private $auth;

    function __construct() {
        $this->title = "Categorias de Let's Travel!!";
        $this->smarty = new Smarty();
        $this->auth = new Auth();

    }

    function showAll($categories) {
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/category/categories.tpl');
    } 
    

    function showAdminCategories($categories) {
        $this->smarty->assign('title', 'Administra las Categorias');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/admin/categories.tpl');

    }


    function showEdit($category) {
        $this->smarty->assign('title', 'Edita la categoria');
        $this->smarty->assign('category', $category);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/admin/editCategory.tpl');
    }

    function showError($message) {
        $this->smarty->assign('title', 'Ups, ocurrio un error...');
        $this->smarty->assign('message', $message);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/error/error.tpl');
    }
}