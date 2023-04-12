<?php
require_once __DIR__ . '/../../app/Models/User.php';
require_once __DIR__ . '/../../app/Controllers/Getters.php';

$user = $_POST['user'];
$password = $_POST['password'];
if ($user != null && $password != null) {
    $us = new User($user, $password, "email");
    $result = validateLogin($us);
    if ($result) {
        $_SESSION['user'] = $user;
        header('Location: ' . getInitSesion());
    } else {
        echo '<script>alert("Usuario o Contraseña incorrecta")</script>';
    }
}else{
    echo '<script>alert("Usuario o Contraseña incorrecta")</script>';
}



?>