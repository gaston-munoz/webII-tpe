<?php

class DbHelper {
    
    public $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=lets_travel;charset=utf8', 'root', '');         
    }
}