<?php

function getRoot()
{
    return "http://localhost/corn_project/";
}

function getImage()
{
    return getRoot() . "public_html/img/";
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