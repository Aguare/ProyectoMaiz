<?php
require_once __DIR__ . '/../../resources/config.php';

$conn = connect();

function insertUser($username, $password, $email)
{
    global $conn;
    $sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email');";
    $conn->query($sql);
}

function getUserbyUserName($username)
{
    global $conn;
    $sql = "SELECT * FROM user WHERE username = '$username';";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $user = new User($fila["username"], $fila["password"], $fila["email"]);
            return $user;
        }
    } else {
        return null;
    }
}

$sql = "SELECT * FROM user;";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $user = new User($fila["username"], $fila["password"], $fila["email"]);
        echo "User: " . $fila["username"] . " - Password: " . $fila["password"] . " - Email: " . $fila["email"] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

$conn->close();
?>