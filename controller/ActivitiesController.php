<?php
require_once "./model/ActivitiesModel.php";
require_once "./view/ActivitiesView.php";

class ActivitiesController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ActivitiesModel();
        $this->view = new ActivitiesView();
    }

    function Home($params = null) {
        var_dump(isset($params['ID']));
        if(isset($params[':ID'])) {
            $id = $params[':ID'];
            $activities = $this->model->getActCategory($id);
            $this->view->showActCategory($activities);
        }
        else {
           $activities = $this->model->getAll();
           $this->view->showActivities($activities);
        }

    }

    function Activity($params = null) {
        $id = $params[':ID'];
        $activity = $this->model->getOne($id);
        $this->view->showActivity($activity);
    }

}