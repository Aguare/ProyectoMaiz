<?php
require_once __DIR__ . '/../../resources/config.php';

$conn = connect();
$comentario = $_POST['comentario'];
$id_recipe = $_POST['id_recipe'];
$user = $_POST['user'];

$sql = "INSERT INTO comment (comment, C_id_recipe, C_username, date) VALUES (?, ?, ?, NOW())";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt == false) {
    die('Error en la preparación de la consulta: ' . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "sis", $comentario, $id_recipe, $user);

if (mysqli_stmt_execute($stmt)) {
    $new_comment = array(
        'nombre' => $user,
        'comentario' => $comentario
    );
    http_response_code(200);
    $comment = json_encode($new_comment);
    echo $comment;
}else{
    http_response_code(500);
    $error = array('mensaje' => 'Error al guardar el comentario');
    $error_json = json_encode($error);
    echo $error_json;
}
?>