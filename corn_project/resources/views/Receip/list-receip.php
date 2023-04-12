<?php
require_once '../../../resources/config.php';
require_once '../../../app/Controllers/Getters.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Recetas</title>
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
    include '../../../resources/views/Sesion/sesion-nav.php';
    $url = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $tab = end($parts);
    $numTabs = 0;
    if ($tab != null) {
        $numTabs = getAmounList();
        if ($numTabs >= 4) {
            $numTabs /= 4;
        }
    }

    ?>
    <div class="my-4">
        <br>
    </div>
    <?php
    if ($numTabs != null && $numTabs > 1) {
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if ($tab == 0) {
                    print("disabled");
                } ?>">
                    <a class="page-link" href="<?php echo ($tab - 1); ?>" tabindex="-1">Anterior</a>
                </li>
                <?php
                for ($i = 0; $i <= $numTabs; $i++) {
                    if ($i == $tab) {
                        echo "<li class=\"page-item active\" aria-current=\"page\"><a class=\"page-link\" href=\"" . $i . "\">" . ($i + 1) . "</a></li>";
                        continue;
                    }
                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"" . $i . "\">" . ($i + 1) . "</a></li>";
                }
                ?>
                <li class="page-item <?php if ($tab >= ($numTabs - 1)) {
                    print("disabled");
                } ?>">
                    <a class="page-link" href="<?php echo ($tab + 1); ?>" aria-disabled="true">Siguiente</a>
                </li>
            </ul>
        </nav>
        <?php
    }
    ?>
    <div class="container w-50 my-1">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            $list_recipe = getReceips(intval($tab));
            if ($list_recipe != null) {
                foreach ($list_recipe as $recipe) {
                    echo "<div class=\"col\">";
                    echo "<div class=\"card\">";
                    echo "<img src=\"data:image/jpg; base64," . $recipe->image . "\" class=\"card-img-top\" style=\"max-width: 500px; max-height: 255px;\">";
                    echo "<div class=\"card-body\">";
                    echo "<h5 class=\"card-title\">" . $recipe->name_recipe . "</h5>";
                    echo "<p class=\"card-text\">" . $recipe->description . "</p>";
                    echo "<a class=\"stretched-link\" href=\"view-receip/" . $recipe->id_recipe . "\"></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>