<?php

class UserModel {

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=lets_travel;charset=utf8', 'root', ''); 
    }

    function getAll() {
        $query = $this->db->prepare("SELECT * FROM user");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getUser($email) {
        $query = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([ $email ]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}