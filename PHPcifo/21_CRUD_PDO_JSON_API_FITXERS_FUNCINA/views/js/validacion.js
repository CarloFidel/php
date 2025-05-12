const form = document.querySelector('#formUsuario');
let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
let caractersLatinos = /^[A-ZÀ]{1}[a-zA-ZÀ-ÿ\u00f1\u00d1\s]{2,40}$/;
let numerosPatern = /\d/;
/* let passwordPatern = /[!@#*]/; */
window.erroresValidacion = {
  errorNombre: document.querySelector("#errorNombre"),
  errorUsuario: document.querySelector("#errorUsuario"),
  errorEmail: document.querySelector("#errorEmail"),
  errorPassword: document.querySelector("#errorPassword"),
  errorTipo: document.querySelector("#errorTipo")
};
//NOTA: PARA ACTIVAR LA VALIDACION JS TAMBIEN DESCOMENTAR EL IF DE SCRIPT.JS LINEA 48
const validacion = () => {
  limpiarErrores();
  if (validarNombre() && validarUsuario() && validarEmail() && validarPassword() && validarTipoUsuario()) {
    console.log("formulario correcto");
    return true;
  }
}

const limpiarErrores = () => {
  const errores = [errorNombre, errorUsuario, errorEmail, errorPassword, errorTipo];
  errores.forEach(error => {
    error.style.color = "black";
  });
};


const validarNombre = () => {
  let nombre = form.nombre.value;

  if (nombre.trim() === "") {
    errorNombre.style.color = 'red';
    return false;
  }
  else if (nombre.length < 3 || nombre.length > 30) {
    errorNombre.style.color = 'red';
    return false;
  }

  else if (nombre.match(/[0-9]/)) {
    errorNombre.style.color = 'red';
    return false;

  } else if (!nombre.match(caractersLatinos)) {
    return true;
  }
  else {
    errorNombre.style.color = 'green';
    return true;
  }

}

const validarUsuario = () => {
  let usuario = form.usuario.value;

  if (usuario.trim() === "") {
    errorUsuario.style.color = 'red';
    return false;
  }

  else if (usuario.length < 5 || usuario.length > 8) {
    errorUsuario.style.color = 'red';
    return false;
  } else {
    errorUsuario.style.color = 'green';
    return true;

  }
}

const validarEmail = () => {
  let email = form.email.value;

  if (email.trim() === "") {
    errorEmail.style.color = 'red';
    return false;
  }
  else if (!email.match(emailRegex)) {
    errorEmail.style.color = 'red';
    return false;
  } else {
    errorEmail.style.color = 'green';
    return true;
  }
}

const validarPassword = () => {
  let password = form.password.value;

  const caracteresEspeciales = ['!', '@', '#', '*'];

  for (let i = 0; i < password.length; i++) {
    let caracter = password[i];
    if (caracteresEspeciales.includes(caracter)) {
      return true;
    }
  }

  if (password.trim() === "") {
    errorPassword.style.color = 'red';
    return false;
  }
  else if (password.length < 6 || password.length > 10) {
    errorPassword.style.color = 'red';
    return false;
  }
  else {
    errorPassword.style.color = 'green';
    return true;
  }
}

const validarTipoUsuario = () => {
  let tipoUsuario = form.tipo_usuario.value;

  if (tipoUsuario === "") {
    errorTipo.style.color = 'red';
    return false;
  }

  else {
    errorTipo.style.color = 'green';
    return true;
  }
};

