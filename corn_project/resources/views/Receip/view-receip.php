<?php
require_once __DIR__ . '/../../../resources/config.php';
require_once __DIR__ . '/../../../app/Controllers/Getters.php';
require_once __DIR__ . '/../../../app/Models/Recipe.php';
?>
<?php
// Iniciamos la sesión
session_start();

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION["user"])) {
    // Si el usuario no ha iniciado sesión, lo redirigimos a la página de inicio de sesión
    header("Location: " . getMain());
    exit();
}
$user = $_SESSION['user'];

// Si el usuario ha iniciado sesión, permitimos el acceso a la página restringida
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Receta</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/css/bootstrap.min.css">
    <!-- Incluye el archivo JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/js/bootstrap.min.js">
    </script>
    <script src="<?php echo getRoot(); ?>public_html/JS/saveComment.js"></script>

</head>

<body>
    <?php
    include __DIR__ . '/../Sesion/sesion-nav.php';
    ?>
    <div class="my-3">
        <br>
    </div>
    <div class="container w-50 my-5">
        <?php
        $url = $_SERVER['REQUEST_URI'];
        $parts = explode('/', $url);
        $id = end($parts);
        $recipe = getRecipeId($id);

        if ($recipe != null) {
            ?>
            <h1 class="text-center">
                <?php echo $recipe[0]->name_recipe; ?>
            </h1>
            <div class="row">
                <div class="col my-4">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $recipe[0]->image; ?>" class="rounded"
                        alt="Responsive image" style="max-width: 450px; min-width: auto;">
                    <p class="text-justify">
                        <?php echo $recipe[0]->description; ?>
                    </p>
                    <footer class="blockquote-footer">
                        Publicado por:
                        <?php echo $recipe[0]->fk_username; ?>
                    </footer>
                    <dt>Tiempo de preparación: </dt>
                    <?php
                    $preparationTime = $recipe[0]->preparation_time;
                    $time = DateTime::createFromFormat('H:i:s', $preparationTime);
                    $hours = $time->format('H');
                    $minutes = $time->format('i');
                    $timeString = '';
                    if ($hours > 0) {
                        $timeString .= $hours . ' horas ';
                        if ($hours == 1) {
                            $timeString = $hours . ' hora ';
                        }
                    }
                    if ($minutes > 0) {
                        $tmp = $minutes . ' minutos';
                        if ($minutes == 1) {
                            $tmp = $minutes . ' minuto';
                        }
                        $timeString .= $tmp;
                    }
                    echo $timeString;
                    ?>
                    <dt>Porciones: </dt>
                    <?php echo $recipe[0]->portion; ?>
                    <dt>Categoria: </dt>
                    <span class="badge bg-info">
                        <?php
                        $name = getCategoryId($recipe[0]->fk_id_category);
                        echo $name;
                        ?>
                    </span>
                    <dt>Dificultad: </dt>
                    <?php
                    switch ($recipe[0]->difficulty) {
                        case 1:
                            echo "<span class=\"badge bg-success\">Fácil</span>";
                            break;
                        case 2:
                            echo "<span class=\"badge bg-warning\">Intermedio</span>";
                            break;
                        case 3:
                            echo "<span class=\"badge bg-danger\">Difícil</span>";
                            break;
                    }
                    ?>
                </div>
                <div class="col my-4">
                    <h3 class="text-center">Receta</h3>
                    <?php echo $recipe[0]->instruction ?>
                </div>
            </div>

        </div>
        <div id="comentarios" class="container w-50">
            <?php
            $comments = getCommentsRecipe($recipe[0]->id_recipe);
            ?>
            <h3>Comentarios</h3>
            <?php
            if ($comments != null) {
                foreach ($comments as $c) {
                    ?>
                    <div class="card my-1">
                        <div class="card-header text-body-secondary">
                            <span class="badge bg-secondary">
                                <?php echo $c->C_username; ?>
                            </span>
                            <?php echo getTime($c->date); ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?php echo $c->comment; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info" role="alert">
                    No hay comentarios
                </div>
                <?php
            }
            ?>
        </div>
        <div class="container w-50 my-1">
            <form id="comentario-form">
                <div class="form-group">
                    <input type="hidden" id="id_recipe" value="<?php echo $recipe[0]->id_recipe; ?>">
                    <input type="hidden" id="user_form" value="<?php echo $user; ?>">
                    <textarea class="form-control" id="comentario" rows="2" maxlength="250"
                        placeholder="Escribe aquí tu comentario"></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end my-2">
                    <button class="btn btn-primary me-md-2" type="submit">Enviar</button>
                </div>
            </form>
        </div>
        <?php
        } else {
            print("<div class=\"alert alert-danger\" role=\"alert\">La receta no existe</div>");
        }
        ?>
</body>

</html>