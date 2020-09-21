    var apiKey = 'ts=1&apikey=7d843f12aeddc5633db4806e589f1471&hash=3038a179c78b9c08e14670394e486f3e';

    var url = `https://gateway.marvel.com:443/v1/public/comics?${apiKey}`;
    
    let contenedorList = document.getElementById("contenedorList");
    let contenedorCard = document.getElementById("contenedorCard");
    let cardBuscar = document.getElementById('buscar')
    let table = document.getElementById('table');

    let btnCambioTable = document.getElementById('cambioTable');
    let btnCambioCard = document.getElementById('cambioCard'); 

    btnCambioTable.onclick = (e) => {
        e.preventDefault();
        contenedorCard.classList.add('d-none');
        table.classList.remove('d-none');
        btnCambioCard.classList.remove('d-none');
        btnCambioTable.classList.add('d-none');
        cardBuscar.classList.add('d-none');
    }

    btnCambioCard.onclick = (e) => {
        e.preventDefault();
        contenedorCard.classList.remove('d-none');
        table.classList.add('d-none');
        btnCambioCard.classList.add('d-none');
        btnCambioTable.classList.remove('d-none');
        cardBuscar.classList.remove('d-none');

    }

    fetch(url)
    .then((res) => res.json())
    .then((data) => {
        var datos = data.data.results;
        // console.log(datos)
        if (datos.length) {
            const table = () => {
                datos.forEach((dato, indice) => {
                    contenedorList.innerHTML += `
                        <tr class="text-center">
                            <th scope="row">${ indice + 1}</th>
                            <td class="m-0">
                                <img src="${dato.images[0] == undefined ? 
                                    'https://dummyimage.com/100x150/000/fff' :  
                                    dato.images[0].path+"."+dato.images[0].extension }" 
                                    class="img-fluid w-50 m-0 p-0" alt="Responsive image">
                            </td>
                            <td><h5>${ dato.title}</h5></td>
                            <td><h5>${ dato.series.name}</h5></td>
                            <td>
                                <button type="button" class="btn btn-outline-secondary">
                                    <a href="comic-${dato.id}" class="text-decoration-none nav-link ">visitar</a>
                                </button> 
                            </td>
                        </tr>
                    `;
                });
                //inicializamos la libreria de datatable
                $(document).ready(function() {
                    $('#datosComics').DataTable( {
                        "pagingType": "full_numbers"
                    } );
                } );
            }
            const cards = () =>{
                datos.forEach((dato, indice) => {
                    contenedorCard.innerHTML += `
                        <a href="comic-${dato.id}" class="card border-secondary text-decoration-none bg-transparent mb-3 nav-link text-white" >
                            <div class="row no-gutters ">
                                <div class="col-sm-4 col-md-2">
                                    <img src="${dato.images[0] == undefined ? 
                                        'https://dummyimage.com/100x150/000/fff' :  
                                        dato.images[0].path+"."+dato.images[0].extension }" 
                                        class="img-fluid w-50 h-100 m-0 p-0 rounded mx-auto d-block" alt="Responsive image">
                                </div>
                                <div class="col-sm-8 col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">${ indice + 1}.- ${ dato.title}</h5>
                                        <p class="card-text">${ dato.series.name}</p>
                                    </div>
                                </div>
                            </div>
                        </a>`;
                });
            }
            cards();
            table();
        }

    })
    .catch((error) => console.error(error));
