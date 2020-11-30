<?php

namespace VAULTX;

class Session{
    private $session_token;
    private $userId = NULL;


    function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        $this->session_token = bin2hex(random_bytes(64));
        $_SESSION['token'] = $this->session_token;
        //echo $_SESSION['token'];
    }

    public function isUserLoggedIn(){
       // echo "test";
        if($this->userId == NULL){
            return false;
        }
        return true;
    }
    
}