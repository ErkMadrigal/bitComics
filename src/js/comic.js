
const apiKey = 'ts=1&apikey=7d843f12aeddc5633db4806e589f1471&hash=3038a179c78b9c08e14670394e486f3e';

var urlComic = `https://gateway.marvel.com:443/v1/public/comics/${idComic}?${apiKey}`;
var urlPersonaje = `https://gateway.marvel.com:443/v1/public/comics/${idComic}/characters?${apiKey}`;

var comicInformacion = document.getElementById('comicInformacion');
var sliderPersonajes = document.getElementById('sliderPersonajes');
var textComic = document.getElementById('textComic');

fetch(urlComic)
    .then((res) => res.json())
    .then((data) => {
        var datos = data.data.results;
        if (datos.length) {
            datos.forEach((dato) => {
                let fecha = dato.modified; 
                let fechaHora = fecha.split('T'); 
                let hora = fechaHora[1].split('-'); 

                comicInformacion.innerHTML = `
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="${dato.thumbnail.path+'.'+dato.thumbnail.extension}" class="card-img" style="height:25rem;"  alt="img">
                        </div>
                        <div class="col-md-8 mt-5">
                            <div class="card-body">
                                <h5 class="card-title">${dato.title}</h5>
                                <p>volumen: <b>${dato.stories.available}</b></p>
                                <p class="mb-5">No. de paginas: <b>${dato.pageCount}</b></p>
                                <p class="card-text mt-5"><small class="text-muted">modificado el dia  ${fechaHora[0]+' a las '+ hora[0]+' horas'}</small></p>
                            </div>
                        </div>
                    </div>`;

                    textComic.innerHTML = `
                        <p class="card-text text-secondary text-justifys font-weight-bolder">
                            ${dato.description == null ? 'Descripcion no disponible': dato.description}
                        </p>`;

            })
        }
    })
    .catch((error) => console.error(error));

    fetch(urlPersonaje)
    .then((res) => res.json())
    .then((dataPersonajes) => {
        var personajes = dataPersonajes.data.results;
        if (personajes.length) {
            console.log(personajes)
            personajes.forEach((personaje)=>{
                sliderPersonajes.innerHTML += `
                <div class="swiper-slide">
                    <img src="${personaje.thumbnail.path+'.'+personaje.thumbnail.extension}" class="img-fluid w-100 h-100" alt="image comic">
                </div>`;
            })
        }else{
            sliderPersonajes.innerHTML += `<h1 class="text-white">personaje(s) no disponible(s)</h1>`;
        }
    })
    .catch((error) => console.error(error));

    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 1,
        spaceBetween: 20,
        // init: false,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 50,
          },
        },
      });
      