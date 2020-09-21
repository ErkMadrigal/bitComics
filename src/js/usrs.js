const estatus = (value, id, nombre) => {

    var urlStatus = root+"backEnd/";
    let dataStatus = new FormData();
    dataStatus.append("opcion", "status");
    dataStatus.append("idUsr", id);
    dataStatus.append("value", value == 1 ? 0 : 1);
    dataStatus.append("nombre", nombre);
    fetchAPI(urlStatus, "POST", dataStatus)
    .then((dataStatus)=>{
        if(dataStatus.estatus == "ok"){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: dataStatus.mensaje,
                showConfirmButton: false,
                timer: 1500
              })
        }else{
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: dataStatus.mensaje,
                showConfirmButton: false,
                timer: 1500
              })
        }
    })

}

const eliminarUsuario = (id, nombre) => {
    
    Swal.fire({
        title: 'estas seguro que quieres eliminarlo definitivamente?',
        text: nombre,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, bórralo!'
      }).then((result) => {
        if (result.isConfirmed) {
            var urlDelete = root+"backEnd/";
            let dataDelete = new FormData();
            dataDelete.append("opcion", "eliminar");
            dataDelete.append("idUsr", id);
            dataDelete.append("nombre", nombre);
            fetchAPI(urlDelete, "POST", dataDelete)
            .then((dataDelete)=>{
                if(dataDelete.estatus == "ok"){
                    Swal.fire(
                        'eliminado!',
                        dataDelete.mensaje,
                        'success'
                      )
                      cargarUsuarios();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: dataDelete.mensaje,
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            })
        }
      })

}

const imagen = (avatar, nombre, apellido) => {
    Swal.fire({
        title: 'imagen!',
        text: nombre+" "+ apellido,
        imageUrl: root+"src/"+avatar,
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image',
      })
}


const cargarUsuarios = () => {
    var contenedorUsr = document.getElementById('contenedorUsr');
    contenedorUsr.innerHTML = "";
    var urlGetUser = root+"backEnd/";
    let dataUsr = new FormData();
    dataUsr.append("opcion", "getUsrs");
    dataUsr.append("idUsr", idUsr);
    fetchAPI(urlGetUser, "POST", dataUsr)
    .then((dataUsr)=>{
        let usuarios = dataUsr.mensaje;
        if(dataUsr.estatus == "ok"){
            usuarios.forEach((usuario, indice) => {
                contenedorUsr.innerHTML += `
                    <tr data-toggle="tooltip" data-placement="top" title="Telefono: ${usuario.telefono+" correo: "+ usuario.correo}">
                        <th scope="row">${ indice + 1}</th>
                        <td>${usuario.nombreUser}</td>
                        <td>${usuario.nombreUsuario} ${usuario.apellidosUsuario}</td>
                        <td>${usuario.Puesto}</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" value="${usuario.status}" onclick="estatus(this.value, '${usuario.idUsuario}', '${usuario.nombreUsuario}')" ${usuario.status == 1 ? 'checked' : ' '}>
                                <span class="slider round text-dangerzz"></span>
                            </label>
                        </td>
                        <td>${usuario.nombreSucursal}</td>
                        <td><button onclick="imagen('${usuario.avatar}', '${usuario.nombreUsuario}', '${usuario.apellidosUsuario}')" class="btn btn-link text-white">Avatar</button></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-danger" onclick="eliminarUsuario(${ usuario.idUsuario } , '${ usuario.nombreUsuario }' )"><i class="fas fa-trash-alt"></i></button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal${usuario.idUsuario}"><i class="fas fa-edit"></i></button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal${usuario.idUsuario}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-color">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">${usuario.nombreUsuario} ${usuario.apellidosUsuario}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation-${usuario.idUsuario}" novalidate>
                                                    <div class="modal-body p-5">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12 m-0 p-0">
                                                                <label for="">Nombre(s)</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text"  name="name" class="form-control" placeholder="Nombre" value="${usuario.nombreUsuario}" required>
                                                                    <div class="invalid-feedback">
                                                                        agrega un nombre
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-5 col-sm-12 m-0 p-0">
                                                                <label for="">Apellido(s)</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text"  name="apellido" class="form-control" placeholder="Apellido" value="${usuario.apellidosUsuario}" required>
                                                                    <div class="invalid-feedback">
                                                                        agrega un apellido
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 m-0 p-0">
                                                                <label for="">Correo</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="email" name="email"  class="form-control" placeholder="Email" value="${usuario.correo}" required>
                                                                    <div class="invalid-feedback">
                                                                        agrega un correo
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 m-0 p-0">
                                                                <label for="">Telefono</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="number" name="telefono"  class="form-control" placeholder="Telefono" value="${usuario.telefono}" required>
                                                                    <div class="invalid-feedback">
                                                                        agrega un telefono
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 m-0 p-0">
                                                                <label for="">Nombre de Usr</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text"  name="user" class="form-control" placeholder="nombre de usuario" required value="${usuario.nombreUser}">
                                                                    <div class="invalid-feedback">
                                                                        agrega un nombre de usuario
                                                                    </div>
                                                                </div>
                                                                <small id="emailHelp" class="form-text text-muted">ingresa un nombre de usario Afanumerico</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button  class="btn btn-primary">Registrar</button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                            </div>
                        </td>
                    </tr>
                `;

            });
            // inicializamos la libreria de datatable
            $(document).ready(function() {
                $('#datosUsrs').DataTable( {
                    "pagingType": "full_numbers",
                    retrieve: true,
                    // paging: false,  
                } );
            });
            // var formularioEditar = document.getElementsByClassName(`needs-validation-${usuario.idUsuario}`);
            //     Array.prototype.filter.call(formularioEditar, (form) => {
            //         form.addEventListener('submit', (event) => {
            //             event.preventDefault();
            //             event.stopPropagation();
            //             alert('entre')
                        // if (form.checkValidity()) {
                        //     var urlUpdata = root+"backEnd/";
                        //     let dataUpdate = new FormData(formularioEditar[0]);
                        //     dataUpdate.append("opcion","editarUsuario");
                        //     dataUpdate.append("idUsuario",usuario.idUsuario);
                        //     dataUpdate.append("nombreUsuario",usuario.nombreUsuario);
                        //     fetchAPI(urlUpdata, 'POST', dataUpdate)
                        //     .then((dataUpdate)=>{
                        //         console.log(dataUpdate)
                        //     })
                        //     .catch((e)=>console.log(e));
                        // }
                //         form.classList.add('was-validated');
                //     },false);
                // }); 
        }
    })
    .catch((e)=>console.log(e));


}


cargarUsuarios();