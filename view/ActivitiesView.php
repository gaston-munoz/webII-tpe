<?php

require_once "./libs/smarty/Smarty.class.php";

class ActivitiesView {

    private $title;
    private $smarty;

    function __construct() {
        $this->title = "Let's Travel!!";
        $this->smarty = new Smarty();
    }

    function showActivities($activities) {
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('activities', $activities);
        $this->smarty->display('templates/activities.tpl');
    }

    function showActivity($activity) {
        $this->smarty->assign('activity', $activity);
        $this->smarty->assign('title', $activity->title);
        $this->smarty->display('templates/activity.tpl');
    }

    function showActCategory($activities) {
        $this->smarty->assign('title', 'Actividades de la categoria: ' . $activities[0]->name);
        $this->smarty->assign('activities', $activities);
        $this->smarty->display('templates/activities.tpl');
    }
}