<?php
namespace VAULTX;

use \PDO;

class Database {

    private $conn;
    private $username = 'root';
    private $password = '';
    private $statement;
    private $error;
    

    public function __construct(){
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=vaultxdb', $this->username,$this->password);
        }
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
        if($this->error){
            exit($this->error);
        }
    }

    public function query($query){
        $this->statement = $this->conn->prepare($query);
    }
    
    public function execute(){
        try{
            return $this->statement->execute();
        }
        catch(PDOException $e){
            $this->error = $e;
        }
    }

    public function results(){
        $exec = $this->execute();
        if($exec){
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            $this->error = "There was an error with the query.";
        }
    }

    public function result(){
        $exec = $this->execute();
        if($exec){
            return $this->statement->fetch(PDO::FETCH_ASSOC);
        }
        else{
            $this->error = "There was an error with the query.";
        }
    }

    public function rowCount(){
        return $this->statement->rowCount();
    }

    public function closeConnection(){
        $this->conn = null;
    }

    public function error(){
        if($this->error != NULL){
            return $this->error;
        }
        else{
            return "No error";
        }
    }
    public function bind($param, $value, $type = NULL)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindParam($param, $value, $type);
    }
}


?>