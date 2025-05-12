const btnInsertar = document.querySelector("#btnInsertar");
const btnBorrar = document.querySelector("#btnBorrar");
const nombre = document.querySelector("#nombre");
const apellido = document.querySelector("#apellido");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const tipo_usuario = document.querySelector("#tipo_usuario");
const foto = document.querySelector("#foto");//capturar el elemento foto
const tablaDatos = document.querySelector("#tablaDatos");
let editandoEnCurso = false;
const content = document.querySelector(".content-wrapper");//prevenir muestra de mensajes

// mostrando mensajes al usuario
const mostrarMensaje = (mensaje, esError = false) => {
  // Crear el elemento de mensaje si no existe
  let mensajeElement = document.querySelector(".mensaje-usuario");
  if (!mensajeElement) {
    mensajeElement = document.createElement("div");
    mensajeElement.className = "mensaje-usuario";
    content.insertBefore(mensajeElement,document.querySelector(".table-container"));
  }
  // Configuro el mensaje
  mensajeElement.textContent = mensaje;
  mensajeElement.className = `mensaje-usuario ${esError ? "error" : "exito"}`;
  // Oculto el mensaje después de 5 segundos
  setTimeout(() => {
    mensajeElement.style.opacity = "0";
    setTimeout(() => {
      mensajeElement.remove();
    }, 500);
  }, 5000);
};

// Listener para cargar los datos al iniciar la página
document.addEventListener("DOMContentLoaded", () => {
  cargarDatos();
  inicializarEventos();
});

// Inicializamos todos los eventos
const inicializarEventos = () => {
  // Evento para el botón de insertar
  btnInsertar.addEventListener("click", insertarDato);

  // Eventos para todos los campos del formulario
  const camposFormulario = [
    { elemento: nombre, id: "nombre" },
    { elemento: apellido, id: "apellido" },
    { elemento: email, id: "email" },
    { elemento: password, id: "password" },
  ];
  camposFormulario.forEach((campo) => {
    campo.elemento.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        insertarDato();
      }
    });
  });

  btnBorrar.addEventListener("click", () => {
    nombre.value = "";
    tipo_usuario.value = "";
    email.value = "";
    password.value = "";
    tipo_usuario.value = "";
    foto.value = "";
  });
};



// Traemos los datos desde el servidor
const cargarDatos = async () => {
  try {
    const response = await fetch("api.php");
    const datos = await response.json();
    mostrarDatos(datos);
  } catch (error) {
    mostrarMensaje("Error al cargar los datos: " + error.message, true);
  }
};

// Mostrar los datos en la tabla
const mostrarDatos = (datos) => {
  tablaDatos.innerHTML = "";
  datos.forEach((dato) => {
    const fila = document.createElement("tr");
    fila.innerHTML = `
            <td>${dato.id}</td>
            <td>
            <div class="foto-container">
            img src="${dato.foto || "views/img/default_user.svg"}"
            alt="Foto de ${dato.nombre_apellido}" class="user-photo" onerror="this.onerror='views/img/default_user.svg'; ">
            <button class="btn-foto"> data-id="${dato.id}" tittle="Cambiar foto">&#128247;</button>




            <td class="editable">${dato.nombre}</td>
            <td class="editable">${dato.apellido}</td>
            <td class="editable">${dato.email}</td>
            <td class="editable">${dato.tipo_usuario === 1 ? "Editor" : "Registrado"}</td>
            <td>
              <button class="btn-borrar">Borrar</button>
              <button class="btn-guardar">Editar</button>
            </td>
        `;

    const btnBorrar = fila.querySelector(".btn-borrar");
    btnBorrar.addEventListener("click", () => borrarDato(dato.id));

    const btnGuardar = fila.querySelector(".btn-guardar");
    btnGuardar.addEventListener("click", () => {
      if (btnGuardar.classList.contains("guardando")) {
        guardarCambios(dato.id, btnGuardar);
      } else {
        activarEdicion(fila);
      }
    });
    const btnFoto = fila.querySelector(".btn-foto");
    btnFoto.addEventListener("click", () => cambiarFoto(dato.id));

    tablaDatos.appendChild(fila);
  });
};
//Funcion para cambiar la foto de usuario
const cambiarFoto = (id) => {
  const input = document.createElement("input");
  input.type = "file";
  input.accept = "image/*";

  input.onchange = async (e) => {
    //el input es de tipo file, al cambiar seleccionamos el primer elemento 
    const file = e.target.files[0];
    if (file) {
      //Validamos amaño del archivo (máximo 2mb)
      if (file.size > 2 * 1024 * 1024) {
        mostrarMensaje("El archivo es demasiado grande. Máximo 2MB.", true);
        return;
      }

      //validar tipo de aRCHIVO 
      const 
    }
  }
}
// Activamos la edición de una fila
const activarEdicion = (fila) => {
  if (editandoEnCurso) {
    alert(
      "Por favor, guarde los cambios actuales antes de editar otro registro"
    );
    return;
  }

  editandoEnCurso = true;
  const celdasEditables = fila.querySelectorAll(".editable");

  celdasEditables.forEach((celda) => {
    const valorActual = celda.textContent;
    celda.innerHTML = `<input type="text" value="${valorActual}" class="edit-input">`;
  });

  // Cambiamos el botón a Guardar
  const btnGuardar = fila.querySelector(".btn-guardar");
  btnGuardar.textContent = "Guardar";
  btnGuardar.classList.add("guardando");

  // Agregamos evento Enter a todos los inputs de la fila
  const inputs = fila.querySelectorAll(".edit-input");
  inputs.forEach((input) => {
    input.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        e.preventDefault(); // Prevenimos el comportamiento por defecto
        btnGuardar.click();
      }
    });
  });

  // Enfocamos el primer input
  const primerInput = fila.querySelector(".edit-input");
  if (primerInput) {
    primerInput.focus();
  }
};

// Guardamos los cambios
const guardarCambios = async (id, boton) => {
  if (!boton.classList.contains("guardando")) {
    return;
  }

  const fila = boton.closest("tr");
  const celdas = fila.querySelectorAll("td");
  const nombre =celdas[1].querySelector("input")?.value || celdas[1].textContent;
  const apellido =celdas[2].querySelector("input")?.value || celdas[2].textContent;
  const email =celdas[3].querySelector("input")?.value || celdas[3].textContent;
 /*  const email =celdas[3].querySelector("input")?.value || celdas[3].textContent; */

  try {
    const response = await fetch("api.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        action: "update",
        id: id,
        nombre: nombre,
        apellido: apellido,
        email: email,
      }),
    });

    const resultado = await response.json();

    // Verificamos tanto el código de estado HTTP como el contenido de la respuesta
    if (response.status >= 400 || resultado.error) {
      // Mostrar mensaje de error
      mostrarMensaje(resultado.error || "Error al actualizar el usuario", true);
    } else {
      // Convertimos los inputs de nuevo a texto
      celdas[1].textContent = nombre;
      celdas[2].textContent = apellido;
      celdas[3].textContent = email;
      // Restauramos el botón a Editar
      boton.textContent = "Editar";
      boton.classList.remove("guardando");
      editandoEnCurso = false;
      // Mostrar mensaje de éxito
      mostrarMensaje(resultado.mensaje || "Usuario actualizado correctamente");
    }
  } catch (error) {
    mostrarMensaje("Error al actualizar el usuario: " + error.message, true);
  }
};

// Función para insertar un nuevo dato
const insertarDato = async () => {
  if (!nombre.value || !apellido.value || !email.value || !password.value) {
    mostrarMensaje("Por favor, complete todos los campos", true);
    return;
  }

  try {
    const response = await fetch("api.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        action: "create",
        nombre: nombre.value,
        apellido: apellido.value,
        email: email.value,
        password: password.value,
        tipo_usuario: tipo_usuario.value,
      }),
    });

    const resultado = await response.json();

    // Verificamos tanto el código de estado HTTP como el contenido de la respuesta
    if (response.status >= 400 || resultado.error) {
      // Mostrar mensaje de error
      mostrarMensaje(resultado.error || "Error al crear el usuario", true);
    } else {
      // Limpiar campos y actualizar tabla solo si no hay error
      nombre.value = "";
      apellido.value = "";
      email.value = "";
      password.value = "";
      tipo_usuario.value = "2";
      cargarDatos();

      // Mostrar mensaje de éxito
      mostrarMensaje(resultado.mensaje || "Usuario creado correctamente");
    }
  } catch (error) {
    mostrarMensaje("Error al crear el usuario: " + error.message, true);
  }
};

// Función para borrar un dato
const borrarDato = async (id) => {
  if (confirm("¿Está seguro de que desea borrar este registro?")) {
    try {
      const response = await fetch("api.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          action: "delete",
          id: id,
        }),
      });

      const resultado = await response.json();

      if (response.ok) {
        cargarDatos();

        // Mostrar mensaje de éxito o error según la respuesta
        if (resultado.mensaje) {
          mostrarMensaje(resultado.mensaje);
        } else if (resultado.error) {
          mostrarMensaje(resultado.error, true);
        }
      } else {
        // Mostrar mensaje de error
        mostrarMensaje(resultado.error || "Error al eliminar el usuario", true);
      }
    } catch (error) {
      mostrarMensaje("Error al eliminar el usuario: " + error.message, true);
    }
  }
};
