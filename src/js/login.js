(() => {
    'use strict';

    var alerta = document.getElementById('alerta');
    var textAlert = document.getElementById('textAlert')

    window.addEventListener('load', () => {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation-login');
        // Loop over them and prevent submission
        Array.prototype.filter.call(forms,  (form) => {
            form.addEventListener('submit',  (event)  => {
                event.preventDefault();
                event.stopPropagation();
                if (form.checkValidity()) {
                    let url = root+"backEnd/";
                    let data = new FormData(forms[0]);
                    data.append("opcion","login");
                    fetchAPI(url,"POST",data)
                        .then((data)=>{
                            if(data.estatus == "ok"){
                                let dataSession = new FormData();
                                dataSession.append("idUsuario", data.mensaje.idUsuario);
                                dataSession.append("puesto", data.mensaje.puesto);
                                fetchAPI(root+"src/modules/session/session-start.php", "POST", dataSession)
                                .then((data)=>{
                                if(data.estatus == "ok"){
                                    location.href = "home";
                                }
                            });
                            }else{
                                alerta.classList.remove('d-none');
                                textAlert.innerHTML = `<strong>tenemos un error!</strong> ${data.mensaje}.`; 
                            }
                        })
                    .catch((e)=>console.log(e));
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


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
