<?php 
    $idComic = $_GET['Idcomic']; 
    $comic = $consultas->datoComic($idComic)['mensaje'];    
?>
<?php if($comic['idSucursal']== $infoUsr['sucursal']): ?>
    <div class="alert alert-primary" role="alert">
      <h3>El Comic Esta Disponible</h3>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        <h3>Oops, no esta disponible!. </h3> esta disponible en la sucursal de <?=$comic['nombreSucursal']?>
    </div>
<?php endif; ?>
<div class="container mt-5">
    <div class="card mb-3 w-100  bg-transparent text-white shadow p-3 mb-5 bg-white rounded" id="comicInformacion">
        
    </div>

    <div class="row mb-5">
        <div class="col-md-8" id="textComic"></div>
        <div class="col-md-4"></div>

        <div class="swiper-container mt-5 mb-5">
            <h3 class="text-white">Lista de personajes</h3>
            <div class="swiper-wrapper" id="sliderPersonajes">
                
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        
    </div>
</div>
<script>var idComic = "<?=$idComic;?>";</script>