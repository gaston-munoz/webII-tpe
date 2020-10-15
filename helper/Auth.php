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

    function initSession($user) {
		session_start();
		$_SESSION["name"] = $user->name;
		$_SESSION['LAST_ACTIVITY'] = time(); 
	}

	function removeSession() {
		session_start();
		session_destroy();
		header("Location:".LOGIN);
    }
    
    function isLoggedIn() {
        $result = false;
        if(isset($_SESSION["name"], $_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] < 9000))
            $result = true;

        return $result;
    }
}