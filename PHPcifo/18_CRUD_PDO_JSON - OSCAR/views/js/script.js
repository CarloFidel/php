const btnInsertar = document.querySelector("#btnInsertar");
const nombre = document.querySelector("#nombre");
const apellido = document.querySelector("#apellido");
const tablaDatos = document.querySelector("#tablaDatos");
let editandoEnCurso = false; // Variable para  edición en curso

// Listener para cargar los datos al iniciar la página
document.addEventListener("DOMContentLoaded", () => {
  cargarDatos();
  inicializarEventos();
});

// Inicializamos todos los eventos
const inicializarEventos = () => {
  // Evento para el botón de insertar
  btnInsertar.addEventListener("click", insertarDato);

  // Evento para el campo nombre
  nombre.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      insertarDato();
    }
  });

  // Evento para el campo apellido
  apellido.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      insertarDato();
    }
  });
};

// Traemos los datos desde el servidor
const cargarDatos = async () => {
  try {
    const response = await fetch("api.php");
    const datos = await response.json();
    mostrarDatos(datos);
  } catch (error) {
    console.error("Errorum al cargar los datos:", error);
  }
};

// Mostrar los datos en la tabla
const mostrarDatos = (datos) => {
  tablaDatos.innerHTML = "";
  datos.forEach((dato) => {
    const fila = document.createElement("tr");
    fila.innerHTML = `
            <td>${dato.id}</td>
            <td class="editable">${dato.Nombres}</td>
            <td class="editable">${dato.Apellidos}</td>
            <td><button class="btn-borrar">Borrar</button></td>
            <td><button class="btn-guardar">Editar</button></td>
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
  const nombre =
    fila.querySelector("td:nth-child(2) input")?.value ||
    fila.querySelector("td:nth-child(2)").textContent;
  const apellido =
    fila.querySelector("td:nth-child(3) input")?.value ||
    fila.querySelector("td:nth-child(3)").textContent;

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
      }),
    });
    if (response.ok) {
      // Convertimos los inputs de nuevo a texto
      fila.querySelector("td:nth-child(2)").textContent = nombre;
      fila.querySelector("td:nth-child(3)").textContent = apellido;

      // Restauramos el botón a Editar
      boton.textContent = "Editar";
      boton.classList.remove("guardando");
      editandoEnCurso = false;
    }
  } catch (error) {
    console.error("Error al actualizar el dato:", error);
  }
};

// Función para insertar un nuevo Usuario
const insertarDato = async () => {
  const nom = nombre.value;
  const ap = apellido.value;

  if (!nom || !ap) {
    alert("Por favor, complete todos los campos");
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
        nombre: nom,
        apellido: ap,
      }),
    });

    if (response.ok) {
      nombre.value = "";
      apellido.value = "";
      cargarDatos();
    }
  } catch (error) {
    console.error("Errorum al insertar el dato:", error);
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

      if (response.ok) {
        cargarDatos();
      }
    } catch (error) {
      console.error("Errorum al borrar el dato:", error);
    }
  }
};
