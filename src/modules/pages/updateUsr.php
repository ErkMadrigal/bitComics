<div class="container">
    <div class="mt-5 ">
        <div class="jumbotron bg-transparent">
            <h1 class="display-4">Modifica los datos de los Usuarios!</h1>
            <p class="lead">
                <?= $infoUsr['nombreUsuario']?> <?=$infoUsr['apellidosUsuario']?>
                ten en cuenta que todo dato modificado lo tienes que notificar
            </p>
            <hr class="my-4">
            <p class="h4"><?=$infoUsr['nombreSucursal']?></p>
        </div>
    </div>
    <div class="table-responsive mt-5" id="conten-usr">
        <table class="table table-bordered text-white" id="datosUsrs">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nombreUsr</th>
                    <th scope="col">nombre</th>
                    <th scope="col">puesto</th>
                    <th scope="col">status</th>
                    <th scope="col">sucursal</th>
                    <th scope="col">avatar</th>
                    <th scope="col">update</th>
                </tr>
            </thead>
            <tbody id="contenedorUsr"></tbody>
        </table>
    </div>
</div>