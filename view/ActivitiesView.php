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

    function showActivities($activities, $page, $totalPages) {
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('activities', $activities);
        $this->smarty->assign('page', $page);
        $this->smarty->assign('totalPages', $totalPages);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->display('templates/activity/activities.tpl');  
    }

    // showActivitiesSearch($activities)

    
    function showActivitiesSearch($activities) {
        $this->smarty->assign('title', 'Resultados de la busqueda');
        $this->smarty->assign('activities', $activities);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->display('templates/activity/activitiesSearch.tpl');  
    }

    function showActivity($activity) {
        $this->smarty->assign('activity', $activity);
        $this->smarty->assign('title', $activity->title);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->display('templates/activity/activity.tpl');
    }

    function showActCategory($activities) {
        $title = $activities && $activities[0] ? 'Actividades de la categoria: ' . $activities[0]->name : 'La categoria no tiene actividades'; 
        $this->smarty->assign('title', $title);
        $this->smarty->assign('activities', $activities);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->display('templates/activity/activities.tpl');
    }

    function showAdminActivities($activities, $categories) {
        $this->smarty->assign('title', 'Administra las actividades');
        $this->smarty->assign('activities', $activities);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->display('templates/admin/activities.tpl');

    }


    function showEdit($actv, $categories) {
        $this->smarty->assign('title', 'Edita la actividad');
        $this->smarty->assign('activity', $actv);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->display('templates/admin/editActivity.tpl');
    }

    function showError($message) {
        $this->smarty->assign('title', 'Ups, ocurrio un error...');
        $this->smarty->assign('message', $message);
        $this->smarty->assign('session', $this->auth->isLoggedIn());
        $this->smarty->assign('isAdmin', $this->auth->isLoggedAsAdmin());
        $this->smarty->display('templates/error/error.tpl');
    }
}