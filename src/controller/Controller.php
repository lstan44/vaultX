<?php
namespace VAULTX;
use VAULTX;

include '../model/Database.php';

abstract class Controller{
    protected $error = array();
    protected $db;

    function __construct(){
        $this->db = new Database;
    }
    
    protected function encrypt($pwd){

    }

    protected function decrypt($pwd){

    }

    protected function validateEmail($email){
        /* to validate email:
            find if user input email represents an email,
            then find out if email does not exist in db already.
            return true if both check out.
            return false otherwise, and add error message to $this->error
            */
        
        

    }

    protected function validatePassword($pwd){

    }

    protected function verifyPassword($realPwd, $userInputPwd){

    }

}