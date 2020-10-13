<?php
require_once "./model/CategoryModel.php";
require_once "./view/CategoryView.php";

class CategoryController {

    private $view;
    private $model;

    function __construct() {
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
    }
     
    function IndexCategory() {
        $categories = $this->model->getAll();
        $this->view->showAll($categories);
    }
    
}