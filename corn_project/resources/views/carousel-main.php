<?php
require_once '../resources/config.php';
?>
<div class="">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo getRoot(); ?>public_html/img/1.jpg" class="d-block w-100"
                    style="object-fit: contain; max-height: 600px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>¡Muchas variedades!</h5>
                    <p>Solo en Oaxaca México se han registrado más de 25 tipos</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo getRoot(); ?>public_html/img/2.jpg" class="d-block w-100"
                    style="object-fit: contain; max-height: 600px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Alimento versátil</h5>
                    <p>Palomitas, tortillas, harina y muchos alimentos</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo getRoot(); ?>public_html/img/3.jpg" class="d-block w-100"
                    style="object-fit: contain; max-height: 600px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo getRoot(); ?>public_html/img/4.jpg" class="d-block w-100"
                    style="width: auto; max-height: 600px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo getRoot(); ?>public_html/img/5.jpg" class="d-block w-100"
                    style="width: auto; max-height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo getRoot(); ?>public_html/img/6.jpg" class="d-block w-100 "
                    style="width: auto; max-height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>