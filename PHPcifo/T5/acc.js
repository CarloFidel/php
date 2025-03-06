const aumentatexto = document.querySelector("#moretext");
const disminuyetexto = document.querySelector("#lesstext");
const contraste = document.querySelector("#contrast");
const accconteiner = document.querySelector("#conteiner");
const acch1 = document.querySelector("#divtitle");
const elh1 = document.querySelector("#tit");
const accsect = document.querySelector("#acc");
const lebeluno = document.querySelector("#leb");
const lebeldos = document.querySelector("#lebdos");
let tam = 1;

const contras = () => {
  fotoenbody.classList.toggle("acc_body");
  accconteiner.classList.toggle("acc_conteiner");
  cargatemp.classList.toggle("acc_button");
  inpciudad.classList.toggle("acc_input");
  paiselect.classList.toggle("acc_input");
  acch1.classList.toggle("acc_input");
  accsect.classList.toggle("acc_cont");
  mostratemp.classList.toggle("acc_mostra");
  accsect.classList.toggle("acc_acc");
};
const textoaumenta = () => {
  tam = tam + 1;
  let untamaño = 18 + tam;
  lebeluno.style.fontSize = `${untamaño}px`;
  lebeldos.style.fontSize = `${untamaño}px`;
  maxconteiner.style.fontSize = `${untamaño - 3.5}px`;
  minconteiner.style.fontSize = `${untamaño - 3.5}px`;
  actconteiner.style.fontSize = `${untamaño - 3.5}px`;

  if (untamaño > 25) {
    aumentatexto.removeEventListener("click", textoaumenta);
  }
  if (untamaño > 20) {
    disminuyetexto.addEventListener("click", textodisminuye);
  }
};
const textodisminuye = () => {
  tam = tam - 1;
  let untamaño = 18 + tam;
  lebeluno.style.fontSize = `${untamaño}px`;
  lebeldos.style.fontSize = `${untamaño}px`;
  maxconteiner.style.fontSize = `${untamaño - 3}px`;
  minconteiner.style.fontSize = `${untamaño - 3}px`;
  actconteiner.style.fontSize = `${untamaño - 3}px`;

  if (untamaño < 20) {
    disminuyetexto.removeEventListener("click", textodisminuye);
  }
  if (untamaño < 30) {
    aumentatexto.addEventListener("click", textoaumenta);
  }
};
contraste.addEventListener("click", contras);
aumentatexto.addEventListener("click", textoaumenta);
disminuyetexto.addEventListener("click", textodisminuye);
