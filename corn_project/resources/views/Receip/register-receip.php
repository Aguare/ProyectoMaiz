<?php
require_once '../../../resources/config.php';
require_once '../../../app/Controllers/Getters.php';
require_once '../../../app/Models/Category.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar receta</title>
    <link rel="stylesheet" href="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
    <script src="<?php echo getRoot(); ?>vendor/bootstrap-5.3.0/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="<?php echo getRoot(); ?>public_html/css/main.css">
    <!--EDITOR DE TEXTO-->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
</head>

<body>
    <?php
    include '../../../resources/views/main-nav.php';
    ?>
    <div class="my-4">
        <br>
    </div>
    <div class="container w-75  my-5">
        <form method="post" action="<?php echo getRoot(); ?>app/Controllers/ValidateRegister.php" class="was-validated"
            enctype="multipart/form-data">
            <div class="text-center">
                <h1>Registrar Receta</h1>
            </div>
            <div class="row">
                <div class="col">
                    <label for="inputPassword5" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" minlength="4" maxlength="45"
                        placeholder="Ingrese un nombre" required>
                    <div class="mb-3 my-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            minlength="100" maxlength="150" rows="3" required></textarea>
                    </div>
                    <div class="d-none">
                        <textarea class="form-control" name="instruction" rows="3" required></textarea>
                    </div>
                    <div class="mb-3 my-2">
                        <label for="formFile" class="form-label">Foto del Platillo</label>
                        <input class="form-control" type="file" accept=".jpg, .png, .jpeg" max-size="3145728" required
                            name="image" id="formFile">
                    </div>
                    <div class="mb-3 my-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Categoria</label>
                        <select class="form-select" name="category" aria-label="Default select example" required>
                            <?php
                            $categorys = getCategorys();

                            foreach ($categorys as $cat) {
                                echo "<option value='$cat->id_category'>$cat->name_category</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 my-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Dificultad</label>
                        <select class="form-select" name="difficulty" aria-label="Default select example" required>
                            <option value="1">Fácil</option>
                            <option value="2">Intermedio</option>
                            <option value="3">Difícil</option>
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="hora">Tiempo de preparación</label>
                        <div class="row">
                            <div class="col-sm">
                                <label for="hora">Horas</label>
                                <input type="number" class="form-control" id="hora" name="hours" min=0 max=23
                                    placeholder="HH" required>
                            </div>
                            <div class="col-sm">
                                <label for="hora">Minutos</label>
                                <input type="number" class="form-control" id="minutos" name="minutes" min=0 max=59
                                    placeholder="MM" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 my-2">
                        <label for="cantidad">Cantidad de Porciones</label>
                        <input type="number" class="form-control" id="cantidad" name="quantity" min="1" step="1"
                            required>
                    </div>
                </div>
                <div class="col">
                    <div class="my-2 text-center">
                        <label for="exampleFormControlTextarea1" class="form-label">Ingrese los ingredientes y las
                            instrucciones</label>
                        <div #editor id="editor">
                            <h2>INGREDIENTES</h2>
                            <br>
                            <h2>INSTRUCCIONES</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" id="button" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        const q = document.querySelector('#editor .ql-editor');
        const button = document.querySelector('#button');

        button.addEventListener('click', () => {
            const desc = document.querySelector('textarea[name="instruction"]');
            desc.value = q.innerHTML;
        });
    </script>
</body>

</html>