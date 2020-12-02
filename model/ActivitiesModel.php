<?php
require_once('./helper/DbHelper.php');

class ActivitiesModel {
    private $dbHelper;

    function __construct()  {
        // $this->db = new PDO('mysql:host=localhost;'.'dbname=lets_travel;charset=utf8', 'root', ''); 
        $this->dbHelper = new DbHelper();
    }

    function getAllWithCategories() {
        $query = $this->dbHelper->db->prepare("SELECT activity.*, category.name  FROM activity INNER JOIN category ON category.id = activity.categoryId");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getSearchWithCategories($text, $min, $max) {
        $query = $this->dbHelper->db->prepare("SELECT activity.*, category.name  FROM activity INNER JOIN category ON category.id = activity.categoryId WHERE title REGEXP ? AND price >= ? AND price <= ?");
        $query->execute([ "$text", $min, $max ]);
        $activities = $query->fetchAll(PDO::FETCH_OBJ);
        return $activities;
    }
/*
    function getSearchWithCategoriesPaginate($text, $min, $max, $offset, $limit) {
        $query = $this->dbHelper->db->prepare("SELECT activity.*, category.name  FROM activity INNER JOIN category ON category.id = activity.categoryId WHERE title REGEXP ? AND price >= ? AND price <= ? LIMIT $offset, $limit");
        $query->execute([ "$text", $min, $max ]);
        $activities = $query->fetchAll(PDO::FETCH_OBJ);
        return $activities;
    }
*/
    function getAllWithCategoriesPaginate($offset, $limit) {
        $query = $this->dbHelper->db->prepare("SELECT activity.*, category.name  FROM activity INNER JOIN category ON category.id = activity.categoryId LIMIT $offset, $limit");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getAll() {
        $query = $this->dbHelper->db->prepare("SELECT * FROM activity");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getOne($id) {
        $query = $this->dbHelper->db->prepare("SELECT * FROM activity WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getActCategory ($id) {
        $query = $this->dbHelper->db->prepare("SELECT activity.*, category.name FROM activity INNER JOIN category ON activity.categoryId = category.id WHERE categoryId = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategories() {
        $query = $this->dbHelper->db->prepare("SELECT * FROM category");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    function save($title, $description, $categoryId, $price, $image) {
        $query = $this->dbHelper->db->prepare("INSERT INTO activity (title, description, categoryId, price, image) values (?, ?, ?, ?, ?)");
        $res = $query->execute([ $title, $description, $categoryId, $price, $image ]);
        return $res;
    }

    function remove($id) {
        $query = $this->dbHelper->db->prepare('DELETE FROM activity WHERE id = ?');
        return $query->execute([ $id ]);
    }

    function update($id, $title, $description, $categoryId, $price, $image) {
        $query = $this->dbHelper->db->prepare("UPDATE activity SET title = :title , description =:description, categoryId = :categoryId, price = :price,
            image = :image WHERE id = :id");

        $query->bindParam(':title', $title);
        $query->bindParam(':description', $description);
        $query->bindParam(':categoryId', $categoryId);
        $query->bindParam(':price', $price);
        $query->bindParam(':image', $image);
        $query->bindParam(':id', $id);

        return $query->execute();
    }
}
?>