<?php

class Auth {
    
    function checkLoggedIn(){
        session_start();
        
        if(!isset($_SESSION["name"])){
            header("Location: " . BASE_URL . 'login');
            die();
        }else{
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 9000)) { 
                header("Location: ". LOGOUT);
                die();
            } 
        
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }

    function isAdmin(){
        session_start();
        if(isset($_SESSION["name"]) && $_SESSION["isAdmin"]) {
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 9000)) { 
                header("Location: ". LOGOUT);
                die();
            } 
            $_SESSION['LAST_ACTIVITY'] = time();
        }
        else {
            header("Location: " . BASE_URL . 'actividades');
            die();
        }
    }

    function initSession($user) {
		session_start();
        $_SESSION["name"] = $user->name;
        $_SESSION["userId"] = $user->id;
        $_SESSION["isAdmin"] = $user->isAdmin  === '1';
        $_SESSION['LAST_ACTIVITY'] = time(); 
        var_dump($_SESSION);
	}

	function removeSession() {
		session_start();
		session_destroy();
		header("Location:".LOGIN);
    }
    
    function isLoggedIn() {
        if(session_status() == PHP_SESSION_NONE) {
           session_start();
        }
        $result = false;
        if(isset($_SESSION["name"], $_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] < 9000))
            $result = true;

        return $result;
    }

    function isLoggedAsAdmin() {
        if(session_status() == PHP_SESSION_NONE) {
           session_start();
        }
        $result = false;
        if(isset($_SESSION["name"], $_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] < 9000) && $_SESSION['isAdmin'])
            $result = true;

        return $result;
    }
}