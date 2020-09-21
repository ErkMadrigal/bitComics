<div id="slider" class="slider-big">
    <h1 class="font-weight-light"><?=$infoUsr['nombreSucursal']?></h1>
</div>
<div class="fondoLogin">

    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper mt-5" id="sliderImg">

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="mt-5 mb-5" style="height:80rem;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php $root?>img/img-sucursal/img4.jpg" class="d-block w-100" style="height:40rem;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Binevenido <?= $infoUsr['nombreUsuario']?> <?=$infoUsr['apellidosUsuario']?></h1>
                        <p>danos un vistaso</p>
                    </div>
                </div>
                <?php $cont =1;?>
                <?php foreach($sucursales as $sucursal):?>
                                <option value="<?= $sucursal['idSucursal']?>"></option>
                    <div class="carousel-item">
                        <img src="<?php $root?>img/img-sucursal/img<?=$cont++?>.jpg" class="d-block w-100" style="height:40rem;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1><?= $sucursal['nombreSucursal']?></h1>
                            <p class="h3"><?= $sucursal['direccionSucursal']?></p>
                        </div>
                    </div>
                <?php endforeach;?>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="" style="height:50rem;">
        <div class="mt-5">
            <div class="jumbotron bg-card">
                <h1 class="display-4">Hola Amigo!</h1>
                <p class="lead"> Para el desarrollo de este proyecto se han utilizado las tecnologias y opciones de:</p>
                <hr class="my-4">
                <p>Heroku, cleverCLoud, gitHub, php, MySQL, .htaccess, html5, css3 Bootstrap, JavaScrip nativo y jquery, la
                    API oficial de Marvel.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
    </div>  
</div>