const correo = document.querySelector('#correo');
const clave = document.querySelector('#clave');
const form = document.querySelector('#formLogin');
const alerta = document.querySelector('.alerta');

//eventos
form.addEventListener('submit',validarLogin);



//funciones

function validarLogin(e){

     e.preventDefault();
     const correoValue = correo.value.trim();
     const claveValue = clave.value.trim();

     if(correoValue === '' || claveValue === '')
     {
          alerta.textContent = 'Todos los campos son obligatorios';
          alerta.classList.remove('visually-hidden'); //muestra el mensaje de error
     }else
     {
          alerta.classList.add('visually-hidden'); //oculta el mensaje de error
          form.submit(); //envia el formulario al servidor
     }
}

