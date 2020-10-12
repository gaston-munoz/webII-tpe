<?php
require_once('./model/ActivitiesModel.php');
require_once('./view/ActivitiesView.php');

class ActivitiesController {

    private $model;
    private $view;

    function __constructor() {
        $this->model = new ActivitiesModel();
        $this->view = new ActivitiesView();
    }
}