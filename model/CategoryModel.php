<?php
require_once('./helper/DbHelper.php');

class CategoryModel {

    private $dbHelper;

    function __construct() {
        $this->dbHelper  = new DbHelper(); 
    }

    function getAll() {
        $query = $this->dbHelper->db->prepare("SELECT * FROM category");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getOne($id) {
        $query = $this->dbHelper->db->prepare("SELECT * FROM category WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function save($name, $description) {
        $query = $this->dbHelper->db->prepare("INSERT INTO category (name, description) values (?, ?)");
        $res = $query->execute([ $name, $description ]);
        return $res;
    }

    function remove($id) {
        $query = $this->dbHelper->db->prepare('DELETE FROM category WHERE id = ?');
        return $query->execute([ $id ]);
    }

    function update($id, $name, $description) {
        $query = $this->db->prepare("UPDATE category SET name=:name, description=:description WHERE id=:id");
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':id', $id);


        return $query->execute();
    }
}