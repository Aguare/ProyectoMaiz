<?php
require_once __DIR__ . '/../../../resources/config.php';
require_once __DIR__ . '/../../../app/Controllers/Getters.php';
require_once __DIR__ . '/../../../app/Models/Recipe.php';
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
    <script src="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/js/bootstrap.min.js">
    </script>
</head>

<body>
    <?php
    include __DIR__ . '/../Sesion/sesion-nav.php';
    ?>
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
            <div class="row border rounded-1 m-2">
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
            <?php
        } else {
            print("<div class=\"alert alert-danger\" role=\"alert\">La receta no existe</div>");
        }
        ?>
    </div>
</body>

</html>