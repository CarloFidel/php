const btnInsertar = document.querySelector("#btnInsertar");
const nombre = document.querySelector("#nombre");
const apellido = document.querySelector("#apellido");
const tablaDatos = document.querySelector("#tablaDatos");

// Listener para cargar los datos al iniciar la página
document.addEventListener("DOMContentLoaded", () => {
  cargarDatos();
  inicializarEventos();
});

// Inicializamos todos los eventos
const inicializarEventos = () => {
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

// Función que carga los datos del servidor
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
    <td class="editable">${dato.id}</td>
    <td class="editable">${dato.Nombres}</td>
    <td class="editable">${dato.Apellidos}</td>
    <td class="bot">
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

// Activar la edición de una celda
const activarEdicion = (celda) => {
  const valorActual = celda.textContent;
  celda.innerHTML = `<input type="text" value="${valorActual}" class="edit-input">`;
  const input = celda.querySelector("input");
  input.focus();

  // Agregamos evento para guardar al presionar Enter
  input.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      const btnGuardar = celda.closest("tr").querySelector(".btn-guardar");
      btnGuardar.click();
    }
  });
};

// Guardar cambios
const guardaCambios = async (id, boton) => {
  const fila = boton.closest("tr");
  const nombre = fila.querySelector("td:nth-child(2) input").value;
  const apellido = fila.querySelector("td:nth-child(3) input").value;

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
      fila.querySelector("td:nth-child(2)").textContent = nombre;
      fila.querySelector("td:nth-child(3)").textContent = apellido;
    }
  } catch (error) {
    console.error("Error al actualizar el dato", error);
  }
};

// Insertar un nuevo dato
const insertarDato = async () => {
  const nombre = document.querySelector("#nombre").value.trim();
  const apellido = document.querySelector("#apellido").value.trim();

  if (!nombre || !apellido) {
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
        nombre: nombre,
        apellido: apellido,
      }),
    });

    if (response.ok) {
      document.querySelector("#nombre").value = "";
      document.querySelector("#apellido").value = "";
      cargarDatos();
    } else {
      const errorData = await response.json();
      console.error("Error en la respuesta del servidor:", errorData);
    }
  } catch (error) {
    console.error("Error al insertar el dato:", error);
  }
};

// Borrar un dato
const borrarDato = async (id) => {
  if (confirm("¿Está seguro que desea borrar este registro?")) {
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
      console.error("Error al borrar dato", error);
    }
  }
};
