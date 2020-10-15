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

    function getOne($id) {
        $query = $this->db->prepare("SELECT * FROM category WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function save($name, $description) {
        $query = $this->db->prepare("INSERT INTO category (name, description) values (?, ?)");
        $res = $query->execute([ $name, $description ]);
        return $res;
    }

    function remove($id) {
        $query = $this->db->prepare('DELETE FROM category WHERE id = ?');
        return $query->execute([ $id ]);
    }

    function update($id, $name, $description) {
        $newCat = [
            'name' => '$name',
            'description' => '$description',
            'id' => '$id'
        ];
        $query = $this->db->prepare("UPDATE category SET name=:name, description=:description WHERE id=:id");
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':id', $id);


        return $query->execute();
    }
}