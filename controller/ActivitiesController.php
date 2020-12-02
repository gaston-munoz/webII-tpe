<?php
require_once "./model/ActivitiesModel.php";
require_once "./view/ActivitiesView.php";

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
           $limit = 3;
           $page = 1;
           if(isset($_GET['page'])) {
               $page = $_GET['page'];
           }
           $offset = ($page - 1) * $limit;
           $totalActivities = $this->model->getAllWithCategories();
           $activities = $this->model->getAllWithCategoriesPaginate($offset, $limit);
           $this->view->showActivities($activities, $page, ceil(count($totalActivities) / $limit));
        }
    }


    function getSearch() {
        if(isset($_GET['text'], $_GET['min'], $_GET['max'])) {
            $text = $_GET['text'];
            $min = intval($_GET['min']);
            $max = intval($_GET['max']);

            $activities = $this->model->getSearchWithCategories($text, $min, $max);
            $this->view->showActivitiesSearch($activities);
        }
        else {

            header('Location:' . BASE_URL . '/actividades');
        }
    }

    /*
    function getSearchPaginate() {
        if(isset($_GET['text'], $_GET['min'], $_GET['max'])) {
            $text = $_GET['text'];
            $min = intval($_GET['min']);
            $max = intval($_GET['max']);
            
            $page = 1;
            $limit = 2;
            $offset = ($page - 1) * $limit;
            $totalActivities = $this->model->getSearchWithCategories($text, $min, $max);

            $activities = $this->model->getSearchWithCategoriesPaginate($text, $min, $max, $offset, $limit);
            $this->view->showActivities($activities, $page, ceil(count($totalActivities) / $limit), 'Resultado de la busqueda');
        }
        else {

            header('Location:' . BASE_URL . '/actividades');
        }
    }
*/

    function Activity($params = null) {
        $id = $params[':ID'];
        $activity = $this->model->getOne($id);
        $this->view->showActivity($activity);
    }

    function getAdminActivities() {
        $this->auth->isAdmin();
        $categories = $this->model->getCategories();
        $activities = $this->model->getAllWithCategories();
        $this->view->showAdminActivities($activities, $categories);
    }

    function create() {
        $this->auth->isAdmin();
        if(isset($_POST['title'], $_POST['description'], $_POST['categoryId']) && is_numeric($_POST['price'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $categoryId = $_POST['categoryId'];
            $price = $_POST['price'];

            $filePath = '';

            if($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {
                $filename = $_FILES['image']['name'];
                $fileTemp = $_FILES['image']['tmp_name'];
                $filePath = "uploads/img/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                move_uploaded_file($fileTemp, $filePath);
            }
            else {
                $this->view->showError('No ha subido una imagen o tiene un formato incorrecto');
                die();
            }

            $this->model->save($title, $description, $categoryId, $price, $filePath);
            header('Location:' . BASE_URL . 'admin/actividades');
        }
        else {
            $this->view->showError('Todos los campos son obligatorios');
        }
    }

    function getDelete($params = null) {
        $this->auth->isAdmin();
        $id = $params[':ID'];
        if(isset($id)) {
            if($this->model->remove($id))
               header('Location:' . BASE_URL . '/admin/actividades');
        }
        else 
          header('Location:' . BASE_URL . '/admin/actividades');
    } 

    function getEdit($params = null) {
        $this->auth->isAdmin();
        $id = $params[':ID'];
        if(isset($id)) {
            $actv = $this->model->getOne($id);

            if($actv){
                $categories = $this->model->getCategories();
                $this->view->showEdit($actv, $categories);
            }
            else
              $this->view->showError('No existe la actividad');

        }
        else 
          die();

    } 

    function update($params = null) {
        $this->auth->isAdmin();
      $id = $params[':ID'];
      if(isset($id)) {  
        if(isset($_POST['title'], $_POST['description'], $_POST['categoryId']) && is_numeric($_POST['price'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $categoryId = $_POST['categoryId'];
            $price = $_POST['price'];

            $filePath = '';

            var_dump($_FILES, count($_FILES));

            if(count($_FILES) != 0 && ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif")) {
                $filename = $_FILES['image']['name'];
                $fileTemp = $_FILES['image']['tmp_name'];
                $filePath = "uploads/img/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                move_uploaded_file($fileTemp, $filePath);
            }
            else {
                $this->view->showError('No ha subido una imagen o tiene un formato incorrecto');
                die();
            }
            
            $isUpdate = $this->model->update($id, $title, $description, $categoryId, $price, $filePath);
            header('Location:' . BASE_URL . 'admin/actividades');
        }
        else {
            $this->view->showError('Todos los campos son obligatorios');
        }
      }
    }

    function error404() {
        $this->view->showError('Pagina no encontrada - NOT FOUND 404 -');
    }

    function goBack() {
        echo "<script>history.go(-2);</script>"; 
        exit; 
    }


}