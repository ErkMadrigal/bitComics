var apiKey =
  "ts=1&apikey=7d843f12aeddc5633db4806e589f1471&hash=3038a179c78b9c08e14670394e486f3e";

var urlComicHome = `https://gateway.marvel.com:443/v1/public/characters?${apiKey}`;

var sliderImg = document.getElementById("sliderImg");

fetch(urlComicHome)
  .then((res) => res.json())
  .then((data) => {
    var datos = data.data.results;
    if (datos.length) {
      // console.log(datos);
      datos.forEach((dato) => {
      sliderImg.innerHTML += `
            <div class="swiper-slide">
                <img src="${dato.thumbnail.path+'.'+dato.thumbnail.extension}" class="img-fluid w-100 h-100" alt="image comic">
            </div>
      `;
      })
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
