<?php
namespace VAULTX;
include __DIR__ .'/Database.php';
abstract class Model {
    protected $db;

    function __construct(){
        $this->db = new Database;
    }

}