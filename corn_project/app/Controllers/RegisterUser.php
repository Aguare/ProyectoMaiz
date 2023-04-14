<?php
require_once '../../resources/config.php';
include '../../resources/views/main-nav.php';
?>
<link rel="stylesheet" href="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/css/bootstrap.min.css">
<!-- Incluye el archivo JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
<script src="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/js/bootstrap.min.js">
</script>
<link rel="stylesheet" href="<?php echo getRoot(); ?>public_html/css/main.css">
<div class="container w-50 my-5">
    <?php

    $username = $_POST['nombre'];
    $password1 = $_POST['password'];
    $password2 = $_POST['confirmar_password'];

    if ($password1 != $password2) {
        echo "<br><br>";
        print("<div class=\"alert alert-danger\" role=\"alert\">Las contraseñas no coinciden</div>");
        die();
    } else {
        $conn = connect();
        $sql = "INSERT INTO user (username, password) VALUES (?,?);";

        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt == false) {
            die('Error en la preparación de la consulta: ' . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $password1);

        if (mysqli_stmt_execute($stmt)) {
            echo "<br><br>";
            print("<div class=\"alert alert-success\" role=\"alert\">Se registró correctamente, ya puede iniciar sesión</div>");
        } else {
            echo "<br><br>";
            if (mysqli_error($conn) == "Duplicate entry '$username' for key 'user.PRIMARY'") {
                print("<div class=\"alert alert-danger\" role=\"alert\">Error al registrarse, el usuario ya existe</div>");
            } else {
                print("<div class=\"alert alert-danger\" role=\"alert\">Error al registrarse</div>");
            }
        }
    }

    ?>
</div>