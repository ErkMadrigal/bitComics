<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 order-2 order-lg-1 order-xl-1">
            <div class="" id="contenedorCard"></div>
            <!-- inicio de tabla -->
            <div class="table-responsive d-none" id="table">
                <table class="table table-bordered text-center text-white" id="datosComics">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Volumen</th>
                            <th scope="col">Visitar</th>
                        </tr>
                    </thead>
                    <tbody id="contenedorList"></tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4 order-1 order-lg-2 order-lx-2 mr-auto">
            <div class="card mt-4 mb-5 text-center cambiar border-secondary bg-transparent">
                <div class="card-body">
                    <h5 class="card-title text-white">cambiar el formato a tabla</h5>
                    <button class="btn btn-primary btn-block" id="cambioTable">Tabla</button>
                    <button class="btn btn-primary btn-block d-none" id="cambioCard">Card</button>
                </div>
            </div>
            <div class="card text-center buscar border-secondary bg-transparent" id="buscar">
                <div class="card-body">
                    <h5 class="card-title text-white">Buscar</h5>
                    <form action="">
                        <div class="input-group mb-3 mt-4">
                            <input type="text" class="form-control" placeholder="search" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>