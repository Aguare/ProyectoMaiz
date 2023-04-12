<?php
require_once __DIR__ . '/../../resources/config.php';
require_once __DIR__ . '/../../app/Models/Recipe.php';
require_once __DIR__ . '/../../app/Models/Category.php';
require_once __DIR__ . '/../../app/Models/User.php';

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

function getReceips($page)
{
    global $conn;
    $part = $page * 4;
    $sql = "SELECT * FROM Recipe LIMIT 4 OFFSET $part;";
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

function getAmounList()
{
    global $conn;
    $sql = "SELECT COUNT(id_recipe) as 'TOTAL' FROM Recipe;";
    $result = $conn->query($sql);
    $amount = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $amount = $row["TOTAL"];
        }
        return $amount;
    } else {
        return 0;
    }
}

function validateLogin($user)
{
    global $conn;
    try {
        $sql = "SELECT * FROM User WHERE username = '$user->username';";
        $result = $conn->query($sql);
        if ($result != null && $result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $pass = $row["password"];
                if ($pass == $user->password) {
                    return true;
                } else {
                    return false;
                }
            }
        }else{
            return false;
        }
    } catch (Exception $th) {
        echo 'Se ha lanzado una excepción: ' . $th->getMessage();
        return false;
    }
    return false;
}
?>