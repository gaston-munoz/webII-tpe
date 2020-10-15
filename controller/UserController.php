<?php
require "./view/UserView.php";
require "./model/UserModel.php";
require "./helper/Auth.php";


class UserController {

    private $model;
    private $view;
    private $auth;

    function __construct() {
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->auth = new Auth();

    }

    function logout() {
        $this->auth->removeSession();
    }

    function getLogin() {
        if($this->auth->isLoggedIn())
		  header("Location:". BASE_URL . '');
        if(! $this->auth->isLoggedIn())
          $this->view->showLogin(null);
        else   
          $this->view->showAccount();
    }

    function getAccount() {
        $this->auth->checkLoggedIn();
        $this->view->showAccount();
    }

    function logUser() {
        if(isset($_POST['email']) && isset($_POST['password']) ) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->getUser($email);

            if($user === false) {
                $message = 'Usuario o contraseña incorrectos, prueba de nuevo';
                $this->view->showLogin($message);
            }
            else {
                if(password_verify($password, $user->password)){
                    $this->auth->initSession($user);
                    header('Location:'. BASE_URL . 'admin/cuenta');
                   // $this->view->showAccount();
				}else{
                    $message = 'Usuario o contraseña incorrectos, prueba de nuevo';
                    $this->view->showLogin($message);
                }
            }
          //  header('Location:'. BASE_URL . '/ingresar');
        }
        else {
            $message = 'Ups, todos los campos son requeridos... prueba de nuevo';
            $this->view->showLogin($message);
        }
    }

}