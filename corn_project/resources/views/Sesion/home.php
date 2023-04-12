<?php
require_once '../../../resources/config.php';
require_once '../../../app/Controllers/Getters.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio</title>
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
    include getRoot() . 'resources/views/Sesion/sesion-nav.php';
    ?>
</body>

</html>