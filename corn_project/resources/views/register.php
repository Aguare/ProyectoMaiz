<?php
require_once '../config.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="<?php echo getRoot(); ?>/vendor/bootstrap-5.3.0/css/bootstrap.min.css">
    <!-- Incluye el archivo JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
    <script src="<?php echo getRoot(); ?>/vendor/bootstrap-5.3.0/js/bootstrap.min.js">
    </script>
</head>

<body>
    <?php
    include 'main-nav.php';
    ?>
    <br><br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Registro de usuario</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo getRoot(); ?>app/Controllers/RegisterUser.php"
                            class="was-validated">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de Usuario</label>
                                <input type="text" pattern="^\S+$" class="form-control" id="nombre" minlength="4"
                                    maxlength="45" name="nombre" required>

                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" pattern="^\S+$" class="form-control" id="password" minlength="4"
                                    maxlength="250" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmar_password" class="form-label">Confirmar contraseña</label>
                                <input type="password" pattern="^\S+$" class="form-control" id="confirmar_password"
                                    minlength="4" maxlength="45" name="confirmar_password" required>
                            </div>
                            <p class="card-text"><small class="text-body-secondary">No se permiten espacios en blanco</small></p>
                            <div class="d-grid">

                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>