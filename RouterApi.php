<?php
require_once 'RouterClass.php';
require_once 'api/APICommentController.php';

$r = new Router();

// Comments
$r->addRoute("comentarios/:ID", "GET" , "APICommentController", "getByActivity");
$r->addRoute("comentarios", "POST" , "APICommentController", "create");
$r->addRoute("comentarios/:ID", "DELETE" , "APICommentController", "delete");

 $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
