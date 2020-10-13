<?php

class CategoryModel {

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=lets_travel;charset=utf8', 'root', ''); 
    }

    function getAll() {
        $query = $this->db->prepare("SELECT * FROM category");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}