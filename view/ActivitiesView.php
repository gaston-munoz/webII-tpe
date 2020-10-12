<?php

use function PHPSTORM_META\type;

require_once "./libs/smarty/Smarty.class.php";

class ActivitiesView {

    private $title;

    function __construct() {
        $this->title = "Let's Travel!!";
    }

    function showActivities($activities) {
        $smarty = new Smarty();
        $smarty->assign('title', $this->title);
        $smarty->assign('activities', $activities);
        $smarty->display('templates/activities.tpl');
    }

    function showActivity($activity) {
        $smarty = new Smarty();
        $smarty->assign('activity', $activity);
        $smarty->assign('title', $activity->title);
        $smarty->display('templates/activity.tpl');
    }
}