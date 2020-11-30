<?php

namespace VAULTX;
use VAULTX;
include __DIR__.'/Controller.php';

//class to register a new user
class RegisterController extends Controller{
   private $email;
   private $password;
   private $firstname;
   private $lastname;

   public function __construct(){
    $this->email = $_POST['email'];
    $this->password = $_POST['pwd'];
    $this->firstname = $_POST['firstname'];
    $this->lastname = $_POST['lastname'];

    //validate email
    $validEmail = $this->validateEmail($this->email);

    //validate password
    $validPassword = $this->validatePassword($this->password);

    //if valid email & valid password, register user in user db
    

   }
}