<html>

<head>
    <title>PMaíz</title>
    <!-- Incluye el archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="../vendor/bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/principal.css">
    <!-- Incluye el archivo JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
    <script src="../vendor/bootstrap-5.3.0/js/bootstrap.min.js">
    </script>
</head>

<body>
    <?php
    include '../resources/views/main-nav.php';
    ?>
    <?php
    // Iniciamos la sesión
    session_start();

    // Verificamos si hay un mensaje de error almacenado en la variable de sesión
    if (isset($_SESSION["error_message"])) {
        // Si hay un mensaje de error, mostramos el modal
        ?>
        <div class="modal fade" id="modalError" tabindex="-1" aria-labelledby="modalErrorLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalErrorLabel">Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo $_SESSION["error_message"]; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#modalError").modal("show");
            });
        </script>

        <?php
        // Borramos la variable de sesión para que no se muestre el modal nuevamente después de redirigir al usuario
        session_unset();
        session_destroy();
    }
    ?>

    <h1>Gastronomía y Cultura del Maíz</h1>
    <div id="foto" class="col-md-12 div-foto">
    </div>
    <div id="contenido" class="container mt-5 w-75">
        <div class="row">
            <div class="col-sm-4">
                <h2>About Me</h2>
                <h5>Photo of me:</h5>
                <div class="fakeimg">Fake Image</div>
                <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
                <h3 class="mt-4">Some Links</h3>
                <p>Lorem ipsum dolor sit ame.</p>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-7">
                <h2>ALIMENTO ANCESTRAL</h2>
                <h5>El cereal más producido del Mundo, 12 Abril, 2022</h5>
                <img class="img-curiosity" id="img-curiosity" src="img/main-1.jpg" alt="maiz">
                <p class="text-justify">El maíz es el cereal que más se cultiva en el mundo. Su nombre, que significa
                    “lo que sustenta la
                    vida”, demuestra su gran importancia no solo en la alimentación mundial, sino como producto base con
                    muchos usos, ya que está presente en gran variedad de alimentos y preparaciones, como alimento
                    animal y en varias aplicaciones industriales, textiles, aceites y biocombustibles.</p>

                <h2>ALIMENTO ANCESTRAL</h2>
                <h5>El cereal más producido del Mundo, 12 Abril, 2022</h5>
                <img class="img-curiosity" id="img-curiosity" src="img/main-1.jpg" alt="maiz">
                <p class="text-justify">El maíz es el cereal que más se cultiva en el mundo. Su nombre, que significa
                    “lo que sustenta la
                    vida”, demuestra su gran importancia no solo en la alimentación mundial, sino como producto base con
                    muchos usos, ya que está presente en gran variedad de alimentos y preparaciones, como alimento
                    animal y en varias aplicaciones industriales, textiles, aceites y biocombustibles.</p>
                <h2>ALIMENTO ANCESTRAL</h2>
                <h5>El cereal más producido del Mundo, 12 Abril, 2022</h5>
                <img class="img-curiosity" id="img-curiosity" src="img/main-1.jpg" alt="maiz">
                <p class="text-justify">El maíz es el cereal que más se cultiva en el mundo. Su nombre, que significa
                    “lo que sustenta la
                    vida”, demuestra su gran importancia no solo en la alimentación mundial, sino como producto base con
                    muchos usos, ya que está presente en gran variedad de alimentos y preparaciones, como alimento
                    animal y en varias aplicaciones industriales, textiles, aceites y biocombustibles.</p>
                <h2>ALIMENTO ANCESTRAL</h2>
                <h5>El cereal más producido del Mundo, 12 Abril, 2022</h5>
                <img class="img-curiosity" id="img-curiosity" src="img/main-1.jpg" alt="maiz">
                <p class="text-justify">El maíz es el cereal que más se cultiva en el mundo. Su nombre, que significa
                    “lo que sustenta la
                    vida”, demuestra su gran importancia no solo en la alimentación mundial, sino como producto base con
                    muchos usos, ya que está presente en gran variedad de alimentos y preparaciones, como alimento
                    animal y en varias aplicaciones industriales, textiles, aceites y biocombustibles.</p>

            </div>
        </div>
    </div>
    <div class="mt-5 p-4 bg-dark text-white text-center">
        <h6>#6 - Marcos Andrés Aguare Bravo - 201832069</h6>
    </div>
</body>

</html>