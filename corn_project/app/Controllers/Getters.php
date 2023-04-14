<?php
require_once __DIR__ . '/../../resources/config.php';
require_once __DIR__ . '/../../app/Models/Recipe.php';
require_once __DIR__ . '/../../app/Models/Category.php';
require_once __DIR__ . '/../../app/Models/User.php';
require_once __DIR__ . '/../../app/Models/Comment.php';

$conn = connect();

function getCategorys()
{
    global $conn;
    $sql = "SELECT * FROM category;";
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
    $sql = "SELECT * FROM recipe LIMIT 4 OFFSET $part;";
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
    $sql = "SELECT * FROM recipe WHERE id_recipe = $id;";
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
    $sql = "SELECT COUNT(id_recipe) as 'TOTAL' FROM recipe;";
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
        $sql = "SELECT * FROM user WHERE username = '$user->username';";
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
        } else {
            return false;
        }
    } catch (Exception $th) {
        echo 'Se ha lanzado una excepción: ' . $th->getMessage();
        return false;
    }
    return false;
}

function getCommentsRecipe($id_recipe)
{
    global $conn;
    $sql = "SELECT * FROM comment WHERE C_id_recipe = $id_recipe;";
    $result = $conn->query($sql);
    $comments = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comments[] = new Comment(
                $row["id_comment"],
                $row["C_username"],
                $row["C_id_recipe"],
                $row["comment"],
                $row["date"]
            );
        }
        return $comments;
    } else {
        return null;
    }
}

function getTime($datetime, $full = false)
{
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $str = array(
        'y' => 'año',
        'm' => 'mes',
        'w' => 'semana',
        'd' => 'día',
        'h' => 'hora',
        'i' => 'minuto',
        's' => 'segundo',
    );
    foreach ($str as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
            if ($diff->$k > 1) {
                $v .= 's';
            }
        } else {
            unset($str[$k]);
        }
    }

    if (!$full)
        $str = array_slice($str, 0, 1);
    return $str ? 'Hace ' . implode(', ', $str) : 'justo ahora';
}

function getNewDate()
{
    return date("Y-m-d H:i:s");
}

?>