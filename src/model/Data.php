<?php
namespace VAULTX;

include __DIR__ .'/Model.php';

class Data extends Model {
    private $dataTable = "data";

    public function getDataByUserId($userId){
        $query = "SELECT * FROM $this->dataTable WHERE owner = :userId";
        $this->db->query($query);
        $this->db->bind(":userId", $userId);
        
        return $this->db->results();
    }

    public function addNewData($owner,$url,$username,$pwd){
        if($owner == NULL || !is_int($owner)){
            return false;
        }
        $query = "INSERT INTO $this->dataTable(owner,url,username,pwd,date_created)
                    VALUES(:owner, :url, :username, :pwd, NOW() ) ";
        $this->db->query($query);
        $this->db->bind(":owner", $owner);
        $this->db->bind(":url", $url);
        $this->db->bind(":username", $username);
        $this->db->bind(":pwd", $pwd);

        return $this->db->execute();
    }
}