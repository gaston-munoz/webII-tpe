<?php

require_once "./libs/smarty/Smarty.class.php";

class ActivitiesView {

    private $title;
    private $smarty;
    private $auth;

    function __construct() {
        $this->title = "Let's Travel!!";
        $this->smarty = new Smarty();
        $this->auth = new Auth();
    }

    function showActivities($activities) {
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('activities', $activities);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/activity/activities.tpl');
    }

    function showActivity($activity) {
        $this->smarty->assign('activity', $activity);
        $this->smarty->assign('title', $activity->title);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/activity/activity.tpl');
    }

    function showActCategory($activities) {
        $this->smarty->assign('title', 'Actividades de la categoria: ' . $activities[0]->name);
        $this->smarty->assign('activities', $activities);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/activity/activities.tpl');
    }

    function showAdminActivities($activities, $categories) {
        $this->smarty->assign('title', 'Administra las actividades');
        $this->smarty->assign('activities', $activities);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/admin/activities.tpl');

    }


    function showEdit($actv, $categories) {
        $this->smarty->assign('title', 'Edita la actividad');
        $this->smarty->assign('activity', $actv);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->display('templates/admin/editActivity.tpl');
    }
}