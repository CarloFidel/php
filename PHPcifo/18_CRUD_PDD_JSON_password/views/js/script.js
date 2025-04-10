const btnInsertar = document.querySelector("#btnInsertar");
const nombre = document.querySelector("#nombre");
const apellido = document.querySelector("#apellido");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const tipo_usuario = document.querySelector("#tipo_usuario");
const tablaDatos = document.querySelector("#tablaDatos");
const btnGuardar = document.querySelector("#btnGuardar");
let editandoEnCurso = false;
const content = document.querySelector(".content-wrapper");

// mostrando mensajes al usuario
const mostrarMensaje = (mensaje, esError = false) => {
  //Crear el elemtno de mensaje si no existe
  let mensajeElement = document.querySelector(".mensaje-usuario");
  if (!mensajeElement) {
    mensajeElement = document.createElement("div");
    mensajeElement.className = "mensaje-usuario";
    content.insertBefore(
      mensajeElement,
      document.querySelector(".table_container")
    );
  }
  mensajeElement.textContent = mensaje;
  mensajeElement.className = `mensaje-usuario ${esError ? "error" : "exito"}`;
  //Oculto el mensaje despue de 5 segundos
  setTimeout(() => {
    mensajeElement.computedStyleMap.opacity = "0";
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
  btnInsertar.addEventListener("click", insertarDato);

  // Evento para todos los campos del form
  const campoFormulario = [
    { elemento: nombre, id: "nombre" },
    { elemento: apellido, id: "apellido" },
    { elemento: email, id: "email" },
    { elemento: password, id: "password" },
    { elemento: tipo_usuario, id: "tipo_usuario" },
  ];
  campoFormulario.forEach((campo) => {
    campo.elemento.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        insertarDato();
      }
    });
  });
};

// Traemos los datos desde el servidor
const cargarDatos = async () => {
  try {
    const response = await fetch("api.php");
    const datos = await response.json();
    mostrarDatos(datos);
  } catch (error) {
    console.error("Error al cargar datos", error);
  }
};

// Mostrar los datos en la tabla
const mostrarDatos = (datos) => {
  tablaDatos.innerHTML = "";
  datos.forEach((dato) => {
    const fila = document.createElement("tr");
    fila.innerHTML = `
    <td>${dato.id}</td>
    <td class="editable">${dato.nombre}</td>
    <td class="editable">${dato.apellido}</td>
    <td class="editable">${dato.email}</td>
    <td  class="editable">${
      dato.tipo_usuario === 1 ? "Editar" : "Registrar"
    }</td>
    <td>
      <button class="btn-guardar">Guardar</button>
      <button class="btn-borrar">Borrar</button>
    </td>
    `;

    // Agregamos eventos a los elementos de la fila
    const celdasEditables = fila.querySelectorAll(".editable");
    celdasEditables.forEach((celda) => {
      celda.addEventListener("click", () => activarEdicion(celda));
    });

    const btnBorrar = fila.querySelector(".btn-borrar");
    btnBorrar.addEventListener("click", () => borrarDato(dato.id));

    const btnGuardar = fila.querySelector(".btn-guardar");
    btnGuardar.addEventListener("click", () =>
      guardaCambios(dato.id, btnGuardar)
    );

    tablaDatos.appendChild(fila);
  });
};

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
  const nombre =
    celdas[1].querySelector("input")?.value || celdas[1].textContent;
  const apellido =
    celdas[2].querySelector("input")?.value || celdas[2].textContent;
  const email =
    celdas[3].querySelector("input")?.value || celdas[3].textContent;

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

    //Verificamos tanto el codigo de estadp HTTP como el contenido e la respuesta

    if (response.status >= 400 || resultado.error) {
      mostrarMensaje(resultado.error || "Error al actualizar el usuario", true);
    } else {
      celdas[1].textContent = nombre;
      celdas[2].textContent = apellido;
      celdas[3].textContent = email;

      //Restauramos el botón a Editar
      boton.textContent = "Editar";
      boton.classList.remove("guardando");
      editandoEnCurso = false;

      //Mostrar mensaje de exito
      mostrarMensaje(resultado.mensaje || "Usuario actualizado correctamente");
    }
  } catch (error) {
    mostrarMensaje("Error al guardar los cambios" + error.message, true);
  }
};

// Función para insertar un nuevo Usuario
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

    //Verificamos tanto el codigo de estadp HTTP como el contenido e la respuesta
    if (response.status >= 400 || resultado.error) {
      mostrarMensaje(resultado.error || "Error al insertar el usuario", true);
    } else {
      //Limpiar campos y actualizar la tabla solo si no hay error
      nombre.value = "";
      apellido.value = "";
      email.value = "";
      password.value = "";
      tipo_usuario.value = "2";
      cargarDatos();
    }
  } catch (error) {
    mostrarMensaje("Errorum al insertar el dato:", +error.message, true);
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

        //ostrar mensaje de exito o error segun la respuesta

        if (resultado.mensaje) {
          mostrarMensaje(resultado.mensaje);
        } else if (resultado.error) {
          mostrarMensaje(resultado.error, true);
        }
      } else {
        mostrarMensaje(resultado.error || "Error al borrar el usuario", true);
      }
    } catch (error) {
      mostrarMensaje("Errorum al borrar el dato:", +error.message, true);
    }
  }
};
