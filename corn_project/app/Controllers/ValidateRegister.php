<?php
include __DIR__ . '/../../resources/views/main-nav.php';
?>
<div class="container w-50 my-5">
    <?php
    require_once __DIR__ . '/../../resources/config.php';

    $name = $_POST['name'];
    $description = $_POST['description'];
    $instruction = $_POST['instruction'];
    $image = $_FILES['image']['tmp_name'];
    $imageData = "data";
    if (isset($_FILES['image']) && getimagesize($image)) {
        $tamanio_maximo = 1920 * 1080;
        if ($_FILES['image']['size'] > $tamanio_maximo) {
            echo 'El archivo es demasiado grande';
        } else {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
        }
    } else {
        echo "Error al cargar la imagen.";
    }

    $category = $_POST['category'];
    $difficulty = $_POST['difficulty'];
    $hours = $_POST['hours'];
    $minutes = $_POST['minutes'];
    $quantity = $_POST['quantity'];
    if ($hours < 10) {
        $hours = "0" . $hours;
    }
    if ($minutes < 10) {
        $minutes = "0" . $minutes;
    }
    $time = $hours . ":" . $minutes . ":00";
    $id_user = "pato";
    $conn = connect();
    $sql = "INSERT INTO Recipe 
    (name_recipe, description, instruction, image, fk_id_category, difficulty, preparation_time, portions, fk_username) 
    VALUES (?,?,?,?,?,?,?,?,?);";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt == false) {
        die('Error en la preparación de la consulta: ' . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "ssssiisis", $name, $description, $instruction, $imageData, $category, $difficulty, $time, $quantity, $id_user);

    if (mysqli_stmt_execute($stmt)) {
        echo "Se registro la receta.";
        print("<div class=\"alert alert-success\" role=\"alert\">Se registró la receta correctamente</div>");
    } else {
        print("<div class=\"alert alert-danger\" role=\"alert\">Error al registrar la receta</div>");
        print(mysqli_error($conn));
    }


    ?>
</div>
<link rel="stylesheet" href="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/css/bootstrap.min.css">
<!-- Incluye el archivo JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
<script src="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/js/bootstrap.min.js">
</script>
<link rel="stylesheet" href="<?php echo getRoot(); ?>public_html/css/main.css">