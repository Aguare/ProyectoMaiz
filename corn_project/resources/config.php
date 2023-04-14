<?php

function getRoot()
{
    return "http://localhost/corn_project/";
}

function getMain()
{
    return getRoot() . "public_html/index.php";
}

function getImage()
{
    return getRoot() . "public_html/img/";
}

function getInitSesion()
{
    return getRoot() . "resources/views/Receip/list-receip.php/0";
}

function connect()
{
    $conn = new mysqli("localhost", "root", "74ef6a14", "corn_project");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?>