<?php
require_once "./model/ActivitiesModel.php";
require_once "./view/ActivitiesView.php";
require_once "./model/ActivitiesModel.php"; // mmmmmmm

class ActivitiesController {

    private $model;
    private $view;
    private $auth;

    function __construct() {
        $this->model = new ActivitiesModel();
        $this->view = new ActivitiesView();
        $this->auth = new Auth();
    }

    function Home($params = null) {
        if(isset($params[':ID'])) {
            $id = $params[':ID'];
            $activities = $this->model->getActCategory($id);
            $this->view->showActCategory($activities);
        }
        else {
           $activities = $this->model->getAllWithCategories();
           $this->view->showActivities($activities);
        }

    }

    function Activity($params = null) {
        $id = $params[':ID'];
        $activity = $this->model->getOne($id);
        $this->view->showActivity($activity);
    }

    function getAdminActivities() {
        $this->auth->checkLoggedIn();
        $categories = $this->model->getCategories();
        $activities = $this->model->getAllWithCategories();
        $this->view->showAdminActivities($activities, $categories);
    }

    function create() {
        $this->auth->checkLoggedIn();
        if(isset($_POST['title'], $_POST['description'], $_POST['categoryId'], $_POST['image']) && is_numeric($_POST['price'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $categoryId = $_POST['categoryId'];
            $price = $_POST['price'];
            $image = $_POST['image'] ;

            $this->model->save($title, $description, $categoryId, $price, $image);
            header('Location:' . BASE_URL . 'admin/actividades');
        }
        else {
           header('Location:' . BASE_URL . '/admin/actividades');
        }
    }

    function getDelete($params = null) {
        $this->auth->checkLoggedIn();
        $id = $params[':ID'];
        if(isset($id)) {
            if($this->model->remove($id))
               header('Location:' . BASE_URL . '/admin/actividades');

        }
        else 
          header('Location:' . BASE_URL . '/admin/actividades');

    } 

    function getEdit($params = null) {
        $this->auth->checkLoggedIn();
        $id = $params[':ID'];
        if(isset($id)) {
            $actv = $this->model->getOne($id);

            if($actv){
                $categories = $this->model->getCategories();
                $this->view->showEdit($actv, $categories);
            }
            else
               header('Location:' . BASE_URL . '/admin/actividades');

        }
        else 
          die();

    } 

    function update($params = null) {
      $this->auth->checkLoggedIn();
      $id = $params[':ID'];
      if(isset($id)) {  
        if(isset($_POST['title'], $_POST['description'], $_POST['categoryId'], $_POST['image']) && is_numeric($_POST['price'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $categoryId = $_POST['categoryId'];
            $price = $_POST['price'];
            $image = $_POST['image'] ;
            
            $isUpdate = $this->model->update($id, $title, $description, $categoryId, $price, $image);
            var_dump($isUpdate);
            header('Location:' . BASE_URL . 'admin/actividades');
        }
        else {
           header('Location:' . BASE_URL . '/admin/actividades');
        }
      }
    }
}