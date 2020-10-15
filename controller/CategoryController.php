<?php
require_once "./model/CategoryModel.php";
require_once "./view/CategoryView.php";

class CategoryController {

    private $view;
    private $model;
    private $auth;

    function __construct() {
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
        $this->auth = new Auth();

    }
     
    function IndexCategory() {
        $categories = $this->model->getAll();
        $this->view->showAll($categories);
    }

    function getAdminCategories() {
        $this->auth->checkLoggedIn();
        $categories = $this->model->getAll();
        $this->view->showAdminCategories($categories);
    }

    function create() {
        $this->auth->checkLoggedIn();
        if(isset($_POST['name'], $_POST['description'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $this->model->save($name, $description);
            header('Location:' . BASE_URL . 'admin/categorias');
        }
        else {
           header('Location:' . BASE_URL . '/admin/categorias');
        }
    }

    function getDelete($params = null) {
        $this->auth->checkLoggedIn();
        $id = $params[':ID'];
        if(isset($id)) {
            if($this->model->remove($id))
               header('Location:' . BASE_URL . 'admin/categorias');
            else 
              $this->view->showError('No se puede eliminar la categoria porque hay actividades que dependen de ella,
                debe borrarlas primero');
        }
        else 
          header('Location:' . BASE_URL . 'admin/categorias');
    } 

    function getEdit($params = null) {
        $this->auth->checkLoggedIn();
        $id = $params[':ID'];
        if(isset($id)) {
            $cat = $this->model->getOne($id);

            if($cat){
                $this->view->showEdit($cat);
            }
            else
            $this->view->showError('No existe la categoria');

        }
        else 
          $this->view->showError('No existe la categoria');

    } 

    function update($params = null) {
      $this->auth->checkLoggedIn();
      $id = $params[':ID'];
      if(isset($id)) {  
        if(isset($_POST['name'], $_POST['description'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            
            $isUpdate = $this->model->update($id, $name, $description);
            header('Location:' . BASE_URL . 'admin/categorias');
        }
        else {
           header('Location:' . BASE_URL . '/admin/categorias');
        }
      }
    }
    
}