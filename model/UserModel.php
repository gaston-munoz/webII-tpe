<?php
require_once('./helper/DbHelper.php');


class UserModel {

    private $dbHelper;

    function __construct() {
        $this->dbHelper = new DbHelper(); 
    }

    function getAll() {
        $query = $this->dbHelper->db->prepare("SELECT * FROM user");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function save($name, $email, $password) {
        $query = $this->dbHelper->db->prepare("INSERT INTO user (name, email, password) values (?, ?, ?)");
        $query->execute([ $name, $email, $password ]);
        $user = $this->getUser($email);

        return  $user;
    }

    function getUser($email) {
        $query = $this->dbHelper->db->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([ $email ]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getById($id) {
        $query = $this->dbHelper->db->prepare("SELECT * FROM user WHERE id = ?");
        $query->execute([ $id ]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function remove($id) {
        $query = $this->dbHelper->db->prepare('DELETE FROM user WHERE id = ?');
        return $query->execute([ $id ]);
    }

    function changeIsAdmin($id, $val) {
        $query = $this->dbHelper->db->prepare("UPDATE user SET isAdmin = ? WHERE id = ?");
        $res = $query->execute([ $val, $id ]);

        return $res;
    }
/*
    function markAsNoAdmin($id) {
        $query = $this->dbHelper->db->prepare("UPDATE user SET isAdmin = 0 WHERE id = ?");
        $res = $query->execute([ $id ]);

        return $res;
    }
    */


}