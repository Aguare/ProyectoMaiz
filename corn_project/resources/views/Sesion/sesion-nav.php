<?php
require_once '../../resources/config.php';
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo getRoot(); ?>corn_project/public_html/index.php">
            <img src="<?php echo getRoot(); ?>public_html/img/home.png" alt="Logo" style="width:35px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="<?php echo getRoot(); ?>corn_project/public_html/index.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Recetas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="<?php echo getRoot(); ?>resources/views/Receip/list-receip.php/0">Ver</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="<?php echo getRoot(); ?>resources/views/Receip/register-receip.php">Publicar
                                Receta
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>