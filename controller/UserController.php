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
				}else{
                    $message = 'Usuario o contraseña incorrectos, prueba de nuevo';
                    $this->view->showLogin($message);
                }
            }
        }
        else {
            $message = 'Ups, todos los campos son requeridos... prueba de nuevo';
            $this->view->showLogin($message);
        }
    }

    
    function getRegistry() {
        if(!$this->auth->isLoggedIn())
            $this->view->showRegistry(null);
        else 
            header("Location:". BASE_URL . '');     
    }

    function is_valid_email($email) {
        return (false !== filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    function createUser() {
        if(isset($_POST['email'],$_POST['name'], $_POST['password']) && ($_POST['email'] !== '' && $_POST['name'] !== '' && $_POST['password'] !== '') ) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $name = $_POST['name'];

            if(strlen($password) < 4) {
                $message = 'Ups, el password debe tener al menos 4 caracteres... prueba de nuevo';
                $this->view->showRegistry($message);
                die();
            }

            if(!$this->is_valid_email($email)) {
                $message = 'Ups, el email no tiene el formato correcto... prueba de nuevo';
                $this->view->showRegistry($message);
                die();
            }

            $existsEmail = $this->model->getUser($email);

            if($existsEmail) {
                $message = 'El email ya existe, prueba de nuevo';
                $this->view->showRegistry($message);
                die();
            }
            else {
                $hashPass = password_hash($password, PASSWORD_DEFAULT);
                $user = $this->model->save($name, $email, $hashPass);
                var_dump('USER', $user);
                $this->auth->initSession($user);
                $message = 'registro Correcto';
                header('Location:'. BASE_URL . 'admin/cuenta');
            }
        }
        else {
            $message = 'Ups, todos los campos son requeridos... prueba de nuevo';
            $this->view->showRegistry($message);
        }
    }
    

    function getUsersAdmin() {
        $this->auth->isAdmin();
        $users = $this->model->getAll();
        $this->view->showUsers($users);
    }


    function removeUser($params = null) {
        if(isset($params[':ID'])) {
            $id = $params[':ID'];
            $user = $this->model->getById($id);
            if($user) {
                $this->model->remove($id);
                header('Location:' . BASE_URL . 'admin/usuarios');
                return;
            }
        }
        header('Location:' . BASE_URL . 'admin/usuarios');
    }

    
    function markUserAdmin($params = null) {
        if(isset($params[':ID'])) {
            $id = $params[':ID'];
            $user = $this->model->getById($id);
            if($user) {
                $this->model->changeIsAdmin($id, '1');
                header('Location:' . BASE_URL . 'admin/usuarios');
                return;
            }
        }
        header('Location:' . BASE_URL . 'admin/usuarios');
    }

    function markUserNoAdmin($params = null) {
        if(isset($params[':ID'])) {
            $id = $params[':ID'];
            $user = $this->model->getById($id);
            if($user) {
                $this->model->changeIsAdmin($id, '0');
                header('Location:' . BASE_URL . 'admin/usuarios');
            }
        }
        else {
            header('Location:' . BASE_URL . 'admin/usuarios');
        }
    }

}