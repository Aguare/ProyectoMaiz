<?php
require_once __DIR__ . '/../../resources/config.php';
// Iniciamos la sesión
session_start();

// Eliminamos todas las variables de sesión
session_unset();

// Destruimos la sesión
session_destroy();

// Redirigimos a la página de inicio
header('Location: ' . getRoot() . 'public_html/index.php');

?>
