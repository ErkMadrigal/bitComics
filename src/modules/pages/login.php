<div class="alert alert-danger alert-dismissible fade show d-none" id="alerta" role="alert">
    <div class="container">
        <div id="textAlert"></div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<div class="row p-0 m-0 mt-5">
    <div class="col-md-4 offset-md-4">
        <h1 class="text-center text-white">Bit<strong>Comics</strong></h1>
        <div class="card mt-4 border border-primary bg-color">
            <div class="card-header">
                <h5 class="text-center">Regístrese para iniciar su sesión</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation-login" novalidate>
                    <label for="exampleFormControlSelect1 ">Selecciona tu sucursal</label><br>
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
                    <label for="exampleInputEmail1">usuario, correo o telefono</label><br>
                    <div class="input-group mb-3">
                        <input type="text" name="usr" class="form-control" placeholder="ingresa con tu nombre de usuario, correo o telefono" required>
                        <div class="invalid-feedback">
                            agrega un metodo para identificarte
                        </div>
                    </div>
                    <small id="emailHelp" class="form-text text-muted text-white">ingresa con tu nombre de usuario, correo o telefono</small>
                    <label for="exampleInputPassword1"class="mt-3">Password</label>
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
                    <button class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>