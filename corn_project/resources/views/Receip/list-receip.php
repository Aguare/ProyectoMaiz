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
    <script src="../../../vendor/bootstrap-5.3.0/js/bootstrap.min.js">
    </script>
</head>

<body>
    <?php
    include '../../../resources/views/main-nav.php';
    ?>
    <div class="container w-50 my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            $list_recipe = getReceips();
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