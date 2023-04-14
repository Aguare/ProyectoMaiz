<html>

<head>
    <title>PMaíz</title>
    <!-- Incluye el archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="../vendor/bootstrap-5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/principal.css">
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
    <div class="container w-auto">
        <div id="contenido" class="container-fluid mt-5">
            <div class="row">
                <div class="col-sm-4">
                    <br><br>
                    <h6>#6 - Marcos Aguare - 201832069</h6>
                    <p>Ésta página web tiene como propósito dar a conocer cómo el maíz es tan importante para las
                        diferentes gastronomías del mundo. Por lo cual observaremos algunas recetas de diferentes
                        paises. Así como también un poco de cómo se usa este importante alimento en las culturas</p>
                    <div class="sticky-top">
                        <br><br><br>
                        <h3 class="mt-2">TEMAS</h3>
                        <ul class="nav nav-pills flex-column ">
                            <li class="nav-item">
                                <a class="nav-link" href="#gastro">1. Gastronomía Guatemalteca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#platillos-gt">2. Platillos guatemaltecos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#expresion">3. Gastronomía como expresión cultural</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#video-1">4. ¿Cómo surgió el maíz?</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="gastro" class="col-sm-7">
                    <h2 class="text-center">GASTRONOMÍA GUATEMALTECA</h5>
                        <img class="img-curiosity" id="img-curiosity" src="img/AntiguaGuatemala.jpg">
                        <p class="text-justify">El maíz es un ingrediente fundamental en la gastronomía guatemalteca y
                            ha
                            sido parte de la dieta del pueblo guatemalteco durante siglos. Hay una gran variedad de
                            platos
                            tradicionales que utilizan el maíz como ingrediente principal y cada región de Guatemala
                            tiene
                            sus propias preparaciones y recetas.
                        </p>
                        <p class="text-justify">
                            Uno de los platillos más populares es el tamal, que es una mezcla de masa de maíz rellena de
                            carne, verduras y chile, envuelta en hojas de plátano o de maíz y cocida al vapor. Los
                            tamales
                            se pueden encontrar en muchas variedades, como de pollo, cerdo, vegetales, dulces o
                            picantes.
                            Otro platillo popular es el atol, una bebida espesa hecha con masa de maíz, agua, canela,
                            azúcar
                            y a veces chocolate.
                        </p>
                        <p class="text-justify">
                            El atol es una bebida reconfortante que se sirve caliente en el desayuno o
                            la cena. El maíz también se utiliza para preparar tortillas, que son una parte fundamental
                            de la
                            dieta guatemalteca. Las tortillas se hacen a mano, usando masa de maíz y se cocinan en una
                            plancha de hierro o en un comal.
                        </p>
                        <p class="text-justify"> Además, el maíz se utiliza en otros platos tradicionales como el
                            chuchito,
                            el elote loco, el
                            pozol y el pepián. El chuchito es un tamal pequeño, el elote loco es una mazorca de maíz
                            cocida
                            con diferentes ingredientes y aderezos, el pozol es una bebida espesa hecha con masa de
                            maíz,
                            cacao y a veces chile, y el pepián es un guiso de carne con salsa de maíz y especias.
                        </p>
                        <h2 id="platillos-gt" class="text-center mt-5">PLATILLOS GUATEMALTECOS A BASE DE MAÍZ</h2>
                        <h4>1. TORTILLAS</h4>
                        <img class="img-curiosity" id="img-curiosity" src="img/tortillas.jpg" alt="maiz">
                        <h4 class="mt-4">2. TAMALITOS</h4>
                        <img class="img-curiosity" id="img-curiosity" src="img/tamalitos.jpg" alt="maiz">
                        <h4 class="mt-4">3. ELOTES COCIDOS</h4>
                        <img class="img-curiosity" id="img-curiosity" src="img/elotecocido.jpg" alt="maiz">
                        <h4 class="mt-4">4. CHUCHITOS</h4>
                        <img class="img-curiosity" id="img-curiosity" src="img/chuchitos.jpg" alt="maiz">
                        <h2 class="mt-5 text-center" id="expresion">LA GASTRONOMÍA COMO EXPRESIÓN CULTURAL</h2>
                        <h4>ALIMENTOS Y COSTUMBRES CULINARIAS DIFERENTES</h4>
                        <img class="img-curiosity" id="img-curiosity" src="img/mapa-comida.jpg" alt="maiz">
                        <p class="text-justify">Cada país tiene su propia cultura gastronómica, que se refleja en los
                            ingredientes, preparaciones y formas de consumo. En el caso del maíz, por ejemplo, en México
                            es la base de la tortilla, el tlacoyo, el elote y otros platillos; en Perú, se utiliza en la
                            preparación de la chicha y el choclo; en Colombia, se prepara el famoso sancocho con maíz; y
                            en Estados Unidos, se utiliza para hacer las populares palomitas de maíz.</p>
                        <h4 class="mt-4">IDENTIDAD CULTURAL DE LOS PUEBLOS</h4>
                        <img class="img-curiosity" id="img-curiosity" src="img/identidad-cultural.jpg" alt="maiz">
                        <p class="text-justify">La gastronomía no sólo es una expresión de la cultura de un país, sino
                            que también es un factor importante en la construcción de la identidad cultural de los
                            pueblos. El uso del maíz, por ejemplo, puede ser una forma de reivindicar las raíces
                            indígenas de un país y de transmitir a las nuevas generaciones la importancia de preservar
                            la cultura ancestral. Además, la gastronomía puede ser un elemento de unión y cohesión
                            social, ya que la comida es un lenguaje universal que nos une como seres humanos.</p>
                        <h4 id="video-1" class="mt-4">¿Cómo surgió el maíz?</h4>
                        <iframe width="100%" height="450px" src="https://www.youtube.com/embed/OD0GdvbMPAo"
                            title="¿Cómo surgió el maíz?" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <h6>#6 - Marcos Andrés Aguare Bravo - 201832069</h6>
    </div>
</body>

</html>