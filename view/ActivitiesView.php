<?php
require_once "./libs/smarty/Smarty.class.php";

class ActivitiesView {

    function __construct() {

    }

    function showTasks($tasks) {
        $smarty = new Smarty();
        $smarty->assign('tareas_s', $tasks);
        $smarty->display('templates/activities.tpl');
    }

    function showTask($task) {
        $smarty = new Smarty();
        $smarty->assign('tareas_s', $task);
        $smarty->display('templates/activity.tpl');
    }
}