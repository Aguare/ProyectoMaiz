<?php
require_once __DIR__ . '/../../app/Models/User.php';
require_once __DIR__ . '/../../app/Controllers/Getters.php';
require_once __DIR__ . '/../../resources/config.php';

$user = $_POST['user'];
$password = $_POST['password'];
if ($user != null && $password != null) {
    $us = new User($user, $password, "email");
    $result = validateLogin($us);
    if ($result) {
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ' . getInitSesion());
        exit();
    } else {
        setError();
    }
} else {
    setError();
}

function setError()
{
    session_start();
    $_SESSION["error_message"] = "Las credenciales ingresadas son incorrectas";

    // Redirigimos al usuario a la página de inicio de sesión
    header("Location: " . getMain());
    exit();
}

?>