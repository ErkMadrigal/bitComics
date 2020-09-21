
//--------------------Registro--------------------------------//

(() => {
  "use strict";
  window.addEventListener(
    "load",
    () => {
      var forms = document.getElementsByClassName("needs-validation-register");
      var modal = document.getElementById("exampleModal");

      Array.prototype.filter.call(forms, (form) => {
        form.addEventListener(
          "submit",
          (event) => {
            event.preventDefault();
            event.stopPropagation();
            if (form.checkValidity()) {
              let data = new FormData(forms[0]);
              data.append("opcion", "registrar");
              let url = root + "backEnd/";
              console.log(url);
              fetchAPI(url, "POST", data)
                .then((data) => {
                  console.log(data);
                  if (data.estatus == "ok") {
                    Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: data.mensaje,
                      showConfirmButton: false,
                      timer: 1500,
                    });
                    forms[0].reset();
                    forms[0].classList.remove("was-validated");
                    modal.classList.remove("show");
                  } else {
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: data,
                    });
                  }
                })
                .catch((e) => console.error(e));
            }
            form.classList.add("was-validated");
          },
          false
        );
      });

      var inputFile = document.querySelector("#input-file");
      var btnFile = document.querySelector("#btn-file");

      btnFile.onclick = (e) => {
        e.preventDefault();
        inputFile.click();
      };

      inputFile.onchange = (e) => {
        // Creamos el objeto de la clase FileReader
        var reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = () => {
          var img = document.querySelector("#preview");

          img.src = reader.result;
        };
      };
    },
    false
  );
})();

//--------------------Registro--------------------------------//

//--------------------cerrar Session--------------------------------//

var btnCerrarSession = document.querySelector("#cerrar-sesion");

var url = root + "src/modules/session/session-end.php";
btnCerrarSession.onclick = (e) => {
  e.preventDefault();
  fetchAPI(url, "POST")
    .then((data) => {
        // console.log(data)
      let timerInterval;
      Swal.fire({
        title: "espere un momento!",
        html: `espere un momento. <b></b> milliseconds. <br> ${data.mensaje}`,
        timer: 2000,
        timerProgressBar: true,
        onBeforeOpen: () => {
          Swal.showLoading();
          timerInterval = setInterval(() => {
            const content = Swal.getContent();
            if (content) {
              const b = content.querySelector("b");
              if (b) {
                b.textContent = Swal.getTimerLeft();
              }
            }
          }, 100);
        },
        onClose: () => {
          clearInterval(timerInterval);
        },
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log("las credenciales se han eliminado, le deseamos un lindo dia");
          if (data.estatus == "ok") {
            location.href = root + "src/";
          }
        }
      });
    })
    .catch((e) => console.log(e));
};
//--------------------cerrar Session--------------------------------//


let btnPass = document.getElementsByClassName('boton-mostrar-password');
let password = document.getElementById('password');
let prin = document.getElementById('prin')

prin.innerHTML = '<i class="fas fa-eye fa-2x"></i>';


$(".boton-mostrar-password").click(function(e){
    e.preventDefault();
    let type = password.getAttribute('type');
    
    let cambio = type == "password" ? "text" : "password";

    password.setAttribute('type', cambio);
    
    if(type == "password"){
        prin.innerHTML = '<i class="fas fa-lock fa-2x"></i>';
    }else{
        prin.innerHTML = '<i class="fas fa-eye fa-2x"></i>';
    }

});