<?php
require_once('./model/CommentModel.php');
require_once('APIController.php');
require_once("./helper/Auth.php");


class APICommentController extends APIController {

    function __construct() {
        parent::__construct();
        $this->model = new CommentModel();
        $this->view = new APIView();
        $this->auth = new Auth();

    }

    function getByActivity ($params = null) {
        if(isset($params[':ID'])) {
            $id = $params[':ID'];
            $comments = $this->model->getByActivity($id);
            $this->view->response($comments, 200);
        }
        else {
            $this->view->response([], 404);
        }
    }


    function create() {
        $body = $this->getData();
        var_dump($body);
        if(isset($body->userId, $body->activityId, $body->comment, $body->stars)) {

            $save =  $this->model->save($body->userId, $body->activityId, $body->comment, $body->stars);

            var_dump('SAVE --->', $save);
            $this->view->response($save, 201);


        }
        else {
            $this->view->response([], 400);
        }

    }

    function delete($params = null) {
        if(isset($params[':ID'])) {
            $id = $params[':ID'];
            $deleted = $this->model->remove($id);
            $this->view->response($deleted, 200);
        }
        else {
            $this->view->response(false, 404);
        }
    }



}
