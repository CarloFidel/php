const formulario = document.getElementById("formUsuario");
const regNombre = document.getElementById("nombre");
const regUsuario = document.getElementById("usuario");
const regEmail = document.getElementById("email");
const regPass = document.getElementById("password");
const divnombreError = document.getElementById("divnombreerror");
const divusuariError = document.getElementById("divusuarierror");
const divcorreoriError = document.getElementById("divemailerror");
const divpassError = document.getElementById("divpasserror");
const buttonInsertar = document.getElementById("btnInsertar");
const divformError = document.getElementById("errorFormulario");
const inputs = document.querySelectorAll("#formUsuario input");

regNombre.value = "";
regUsuario.value = "";
regEmail.value = "";
regPass.value = "";

divnombreError.style.display = "none";
divusuariError.style.display = "none";
divcorreoriError.style.display = "none";
divpassError.style.display = "none";
divformError.style.display = "none";

const exp = {
  nombre: /^[a-zA-ZÀ-ÿ\u00f1\u00d1\u00c7\s]{5,30}$/,
  usuari: /^[a-zA-Z0-9]{5,8}$/,
  correo:
    /[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,9}/,
  password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#*])[a-zA-Z\d!@#*]{6,10}$/,
};

const campos = {
  nombre: false,
  usuari: false,
  correo: false,
  password: false,
};

const validarform = (e) => {
  switch (e.target.id) {
    case "nombre":
      if (exp.nombre.test(e.target.value)) {
        campos["nombre"] = true;
        regNombre.classList.remove("inputIncorrecto");
        regNombre.classList.add("inputCorrecto");
        divnombreError.style.display = "none";
      } else {
        regNombre.classList.remove("inputCorrecto");
        regNombre.classList.add("inputIncorrecto");
        divnombreError.style.display = "block";
      }
      break;
    case "usuario":
      if (exp.usuari.test(e.target.value)) {
        campos["usuari"] = true;
        regUsuario.classList.remove("inputIncorrecto");
        regUsuario.classList.add("inputCorrecto");
        divusuariError.style.display = "none";
      } else {
        regUsuario.classList.remove("inputCorrecto");
        regUsuario.classList.add("inputIncorrecto");
        divusuariError.style.display = "block";
      }
      break;
    case "email":
      if (exp.correo.test(e.target.value)) {
        campos["correo"] = true;
        regEmail.classList.remove("inputIncorrecto");
        regEmail.classList.add("inputCorrecto");
        divcorreoriError.style.display = "none";
      } else {
        regEmail.classList.remove("inputCorrecto");
        regEmail.classList.add("inputIncorrecto");
        divcorreoriError.style.display = "block";
      }
      break;
    case "password":
      if (exp.password.test(e.target.value)) {
        campos["password"] = true;
        regPass.classList.remove("inputIncorrecto");
        regPass.classList.add("inputCorrecto");
        divpassError.style.display = "none";
      } else {
        regPass.classList.remove("inputCorrecto");
        regPass.classList.add("inputIncorrecto");
        divpassError.style.display = "block";
      }
      break;
  }
};
inputs.forEach((input) => {
  input.addEventListener("keyup", validarform);
  input.addEventListener("change", validarform);
});

const validarYEnviarFormulario = () => {
  divformError.style.display = "none";
  if (campos.nombre && campos.usuari && campos.correo && campos.password) {
    return true;
  } else {
    inputs.forEach((input) => {
      if (input.value.trim() === "") {
        input.classList.add("inputIncorrecto");
        divformError.style.display = "block";
        divformError.textContent =
          "Por favor, completa todos los campos correctamente.";
      }
    });
    return false;
  }
};

// Asociar la función al evento submit
formulario.addEventListener("submit", (e) => {
  if (!validarYEnviarFormulario()) {
    e.preventDefault(); // Prevenir el envío si el formulario no es válido
  }
});

const restablecerFormulario = () => {
  inputs.value = "";
  formulario.reset();
  divnombreError.style.display = "none";
  divusuariError.style.display = "none";
  divcorreoriError.style.display = "none";
  divpassError.style.display = "none";
  divformError.style.display = "none";
  inputs.forEach((input) => {
    input.classList.remove("inputCorrecto");
    input.classList.remove("inputIncorrecto");
  });
};

const validarcampoTabla = (campo, valor) => {
  switch (campo) {
    case "nombre":
      return exp.nombre.test(valor);
    case "usuario":
      return exp.usuari.test(valor);
    case "email":
      return exp.correo.test(valor);
    case "password":
      return exp.password.test(valor);
    default:
      return false;
  }
};
