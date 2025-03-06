const paiselect = document.querySelector("#seleccpais");
const inputCiudad = document.querySelector("#elige_ciudad");
const mostratemp = document.querySelector("#mostra");
const cargatemp = document.querySelector("#btn_temp");
const inpciudad = document.querySelector("#elige_ciudad");
const maxconteiner = document.querySelector("#tmpmax");
const minconteiner = document.querySelector("#tmpmin");
const actconteiner = document.querySelector("#actual");
const fotoenbody = document.body;
const conatainererr = document.querySelector("#errcontainer");
conatainererr.style.display = "none";
mostratemp.style.display = "none";
inputCiudad.value = "";

const fotobackground = (data) => {
  let randompicture = Math.floor(Math.random() * 50);
  const backPicture = data[randompicture];
  const imagen = backPicture.download_url;
  fotoenbody.style.backgroundImage = `url("${imagen}")`;
  fotoenbody.style.backgroundSize = "cover";
  fotoenbody.style.backgroundPosition = "center";
};
const obtenerfoto = () => {
  fetch("https://picsum.photos/v2/list?page=2&limit=50")
    .then((response) => {
      if (!response.ok) throw new Error("Error en la solicitud");
      return response.json();
    })
    .then((data) => {
      fotobackground(data);
    })
    .catch((error) => {
      console.log("Error al cargar la img", error);
    });
};
window.onload = () => {
  obtenerfoto();
  paiselect.focus();
  paiselect.value = "";
};
const temperatura = (data) => {
  let maxEsperada = data.main.temp_max;
  maxconteiner.innerHTML = `La temperatura máxima esperada es ${Math.floor(
    maxEsperada - 273.15
  )} °C`;
  let minEsperada = data.main.temp_min;
  minconteiner.innerHTML = `La temperatura mínima 
  esperada es ${Math.floor(minEsperada - 273.15)} °C`;
  let actual = data.main.temp;
  actconteiner.innerHTML = `La temperatura actual es ${Math.floor(
    actual - 273.15
  )} °C`;
  mostratemp.style.display = "block";
};
const valida = () => {
  conatainererr.style.display = "none";
  if (inputCiudad.value === "" || paiselect.value === "") {
    mostratemp.style.display = "none";
    const cargaError = () => {
      const errorval = "Por favor, introduzca los datos correctaente";
      conatainererr.innerHTML = errorval;
      conatainererr.style.display = "block";
    };
    cargaError();
    const nuevo = () => {
      location.reload();
    };
    setInterval(nuevo, 3000);
  } else {
    obtentemperatura();
  }
};
const obtentemperatura = () => {
  let ciudad = inputCiudad.value;
  let pais = paiselect.value;
  fetch(
    `https://api.openweathermap.org/data/2.5/weather?q=${ciudad},${pais}&appid=61b1ef1bbdead1137b27bd8addf995af`
  )
    .then((response) => {
      if (!response.ok) throw new Error("Error en la solicitud");
      return response.json();
    })
    .then((data) => {
      console.log(data);
      obtenerfoto();
      temperatura(data);
    })
    .catch((error) => {
      console.log("Error al cargar temperatura", error);
    });
};
inputCiudad.addEventListener("focus", () => {
  window.addEventListener("keyup", (event) => {
    if (event.key == "Enter") {
      valida();
    }
  });
});

cargatemp.addEventListener("click", valida);
