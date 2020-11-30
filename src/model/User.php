<?php
namespace VAULTX;
include __DIR__ .'/Model.php';

class User extends Model {
    private $error;
    private $userTable = "users";

    public function getUserById($userId){
        $query = "  SELECT * 
                    FROM $this->userTable
                    WHERE id = :id ;    ";

        $this->db->query($query);
        $this->db->bind(":id", $userId);

        return $this->db->results();
    }

    public function isUserNameAvailable($userName){
        $userName = \strtolower($userName);

        $query = "SELECT COUNT(username) as num
                  FROM $this->userTable
                  WHERE LOWER(username) = :userName; ";
        $this->db->query($query);
        $this->db->bind(":userName", $userName);
        $res = $this->db->result();
        return $res['num'];
    }

    public function registerUser($firstName = "",$lastName = "", $userName, $email ,$pwd){
        if(empty($userName) || empty($pwd) || empty($email)){
            $this->error = "Username, email or password cannot be empty";
            return FALSE;
        }

        if($this->isUserNameAvailable($userName) != 0){
            $this->error = "Username already taken.";
            return false;
        }
        $query = "insert into users(firstname,lastname,username,email, pwd,date_created)
                    VALUES(:firstname,:lastname,:username,:email, :pwd,NOW() )";
        $this->db->query($query);

        $this->db->bind(":firstname", $firstName);
        $this->db->bind(":lastname",$lastName);
        $this->db->bind(":username",$userName);
        $this->db->bind(":email", $email);
        $this->db->bind(":pwd", $pwd);

        $res = $this->db->execute();
        return $res;
    }

    
}