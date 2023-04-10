<?php
require_once __DIR__ . '/../../resources/config.php';
require_once __DIR__ . '/../../app/Models/Recipe.php';
require_once __DIR__ . '/../../app/Models/Category.php';

$conn = connect();

function getCategorys()
{
    global $conn;
    $sql = "SELECT * FROM Category;";
    $result = $conn->query($sql);
    $categorys = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $category[] = new Category($row["id_category"], $row["name_category"]);
        }
        return $category;
    } else {
        return null;
    }
}

function getReceips()
{
    global $conn;
    $sql = "SELECT * FROM Recipe;";
    $result = $conn->query($sql);
    $receips = array();
    if ($result->num_rows > 0) {
        ;
        while ($row = $result->fetch_assoc()) {
            $imageData = base64_encode($row["image"]);
            $receips[] = new Recipe($row["id_recipe"], $row["name_recipe"], $row["description"], $row["instruction"], $imageData, $row["fk_id_category"], $row["difficulty"], $row["preparation_time"], $row["portions"], $row["fk_username"]);
        }
        return $receips;
    } else {
        return null;
    }
}

function getRecipeId($id)
{
    global $conn;
    $sql = "SELECT * FROM Recipe WHERE id_recipe = $id;";
    $result = $conn->query($sql);
    $receips = array();
    if ($result->num_rows > 0) {
        ;
        while ($row = $result->fetch_assoc()) {
            $imageData = base64_encode($row["image"]);
            $receips[] = new Recipe($row["id_recipe"], $row["name_recipe"], $row["description"], $row["instruction"], $imageData, $row["fk_id_category"], $row["difficulty"], $row["preparation_time"], $row["portions"], $row["fk_username"]);
        }
        return $receips;
    } else {
        return null;
    }
}

function getCategoryId($id)
{
    $categorys = getCategorys();
    foreach ($categorys as $category) {
        if ($category->id_category == $id) {
            return $category->name_category;
        }
    }
}
?>