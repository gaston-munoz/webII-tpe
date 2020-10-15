<?php
    require_once 'controller/ActivitiesController.php';
    require_once 'controller/CategoryController.php';
    require_once 'controller/UserController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


    $r = new Router();

    // rutas
    // statics (home)
    $r->addRoute("actividades", "GET", "ActivitiesController", "Home");

    // activities
    $r->addRoute("actividad/:ID", "GET", "ActivitiesController", "Activity");
    $r->addRoute("actividades/categoria/:ID", "GET", "ActivitiesController", "Home"); 

    $r->addRoute("admin/actividades", "GET", "ActivitiesController", "getAdminActivities");
    $r->addRoute("nuevaActividad", "POST", "ActivitiesController", "create");

    $r->addRoute("actividades/editar/:ID", "GET", "ActivitiesController", "getEdit");
    $r->addRoute("actividades/actualizar/:ID", "POST", "ActivitiesController", "update");

    $r->addRoute("actividades/eliminar/:ID", "GET", "ActivitiesController", "getDelete"); 

    // categories
    $r->addRoute("categorias", "GET", "CategoryController", "IndexCategory");

    $r->addRoute("admin/categorias", "GET", "CategoryController", "getAdminCategories");
    $r->addRoute("nuevaCategoria", "POST", "CategoryController", "create");

    $r->addRoute("categorias/editar/:ID", "GET", "CategoryController", "getEdit");
    $r->addRoute("categorias/actualizar/:ID", "POST", "CategoryController", "update");

    $r->addRoute("categorias/eliminar/:ID", "GET", "CategoryController", "getDelete");
    
    // users
    $r->addRoute("login", "GET", "UserController", "getLogin");
    $r->addRoute("login", "POST", "UserController", "logUser");
    $r->addRoute("admin/cuenta", "GET", "UserController", "getAccount");

    $r->addRoute("logout", "GET", "UserController", "logout"); // falta implementar

    $r->addRoute("volver", "GET" , "ActivitiesController", "goBack");

    // default route
    $r->setDefaultRoute("ActivitiesController", "error404");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>