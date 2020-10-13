<?php
require_once "./libs/smarty/Smarty.class.php";

class CategoryView {
    private $title;
    private $smarty;

    function __construct() {
        $this->title = "Categorias de Let's Travel!!";
        $this->smarty = new Smarty();
    }

    function showAll($categories) {
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('templates/category/categories.tpl');
    }   
}