<?php
class ActivitiesModel {
    private $db;

    function __construct()  {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=lets_travel;charset=utf8', 'root', '');
    }

    function getAll() {
        $query = $this->db->prepare("SELECT * FROM activities");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getOne($id) {
        $query = $this->db->prepare("SELECT * FROM activities WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
?>