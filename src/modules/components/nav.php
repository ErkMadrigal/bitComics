<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-menu">
    <div class="container">
        <a class="navbar-brand text-white" href="home">Bit-Comics</a>
        <?php if($navar):?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list-ul"></i> Mis Datos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 45vh;">
                        <div class="container">
                            <img src="<?= $root.$infoUsr['avatar']?> "
                                class="rounded mx-auto d-block rounded-circle border border-light" style="width: 6rem;height: 6rem;" alt="img">
                            <h6 class="mt-3 text-uppercase"><?= $infoUsr['Puesto']?>  <b><?= $infoUsr['nombreUsuario']?> <?=$infoUsr['apellidosUsuario']?></b></h6>
                            <h6 class="mt-3"> <i class="fas fa-envelope"></i> Correo: <b><?= $infoUsr['correo']?></b></h6>
                            <h6 class="mt-3"> <i class="fas fa-phone"></i> Tel.: <b><?= $infoUsr['telefono']?></b></h6>
                        </div>
                        <div class="dropdown-divider"></div>
                        <?php if($infoUsr['puesto'] == 4):?>
                            <ul class="list-group list-group-horizontal-sm text-center ml-2">
                                    <a class="nav-link" href="update"><i class="fas fa-pen-alt"></i>Editar Usuario</a>
                                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i>Nuevo Usuario</a>
                            </ul>
                        <?php endif;?>
                        <?php if($infoUsr['puesto'] == 5):?>
                            <ul class="list-group list-group-horizontal-sm text-center ml-2">
                                    <a class="nav-link" href="update"><i class="fas fa-pen-alt"></i>Editar Usuario</a>
                                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i>Nuevo Usuario</a>
                            </ul>
                            <ul class="list-group list-group-horizontal-sm text-center">
                                    <a class="nav-link ml-3" href="#"><i class="fas fa-pen-alt"></i>Editar Suc</a>
                                    <a class="nav-link ml-3" href="#"><i class="fas fa-folder-plus"></i>Nueva Suc</a>
                            </ul>
                        <?php endif;?>
                        
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="home"> <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="comics"> <i class="fas fa-book-open"></i> Comics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="cerrar-sesion"> <i class="fas fa-sign-out-alt"></i> Exit</a>
                </li>
            </ul>
        </div>
        <?php endif; ?>

    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-color">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation-register" novalidate>
                <div class="modal-body p-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 m-0 p-0">
                            <label for="">Nombre(s)</label>
                            <div class="input-group mb-3">
                                <input type="text"  name="name" class="form-control" placeholder="Nombre" required>
                                <div class="invalid-feedback">
                                    agrega un nombre
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 col-sm-12 m-0 p-0">
                            <label for="">Apellido(s)</label>
                            <div class="input-group mb-3">
                                <input type="text"  name="apellido" class="form-control" placeholder="Apellido" required>
                                <div class="invalid-feedback">
                                    agrega un apellido
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 m-0 p-0">
                            <label for="">Correo</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email"  class="form-control" placeholder="Email" required>
                                <div class="invalid-feedback">
                                    agrega un correo
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 m-0 p-0">
                            <label for="">Telefono</label>
                            <div class="input-group mb-3">
                                <input type="number" name="telefono"  class="form-control" placeholder="Telefono" required>
                                <div class="invalid-feedback">
                                    agrega un telefono
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 m-0 p-0">
                            <label for="">Sucursal</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="sucursal" required>
                                    <option value="">Sucursal</option>
                                    <?php foreach($sucursales as $sucursal):?>
                                        <option value="<?= $sucursal['idSucursal']?>"><?= $sucursal['nombreSucursal']?></option>
                                    <?php endforeach;?>
                                </select>
                                <div class="invalid-feedback">
                                    selecciona una sucursal
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 col-sm-12 m-0 p-0">
                            <label for="">Puesto</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="puesto" required>
                                    <option value="">puesto</option>
                                    <?php foreach($puestos as $puesto):?>
                                        <option value="<?= $puesto['idPuesto']?>"><?= $puesto['Puesto']?></option>
                                    <?php endforeach;?>
                                </select>
                                <div class="invalid-feedback">
                                    selecciona una sucursal
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 m-0 p-0">
                            <label for="">contraseña</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text p-0 m-0">
                                        <button class="btn btn-primary text-white p-0 boton-mostrar-password">
                                            <div id="prin"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    agrega un password
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 m-0 p-0">
                            <label for="">Nombre de Usr</label>
                            <div class="input-group mb-3">
                                <input type="text"  name="user" class="form-control" placeholder="nombre de usuario" required>
                                <div class="invalid-feedback">
                                    agrega un nombre de usuario
                                </div>
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">ingresa un nombre de usario Afanumerico</small>
                        <div class="col-md-12 m-0 p-0 mt-5">
                            <label for="">Imagen Perfil</label>
                            <div class="form-group mb-3">
                                <img src="img/shield.jpg" id="preview" class="img-fluid rounded d-block" alt="foto perfil" style="width: 30%;">
                                <input type="file" class="d-none" id="input-file" accept="image/*" name="imagenPerfil" required>
                                <button class="btn btn-primary" id="btn-file"><i class="fas fa-image"></i> Cargar Imagen</button>
                                <div class="invalid-feedback">
                                    carga una imagen
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group mt-3 ml-3">
                            <div class="icheck-primary">
                                <input class="form-check-input" type="checkbox" id="agreeTerms" name="terms" value="" required >
                                <label class="form-check-label" for="agreeTerms">
                                    Aceptar <a href="#">terminos</a>
                                </label>
                                <div class="invalid-feedback">
                                    acepta los terminos
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-primary" >Registrar</button>
                    <button  class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
