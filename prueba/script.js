const form = document.querySelector(".formulario");
const input = document.querySelector("#busca");
const button = document.querySelector("#enviar");
input.focus();
const longitud = input.value.length; // Longitud del texto actual
input.setSelectionRange(longitud, longitud);
form.addEventListener("submit", (event) => {
  event.preventDefault();
});

input.addEventListener("keyup", () => {
  if (input.value.trim() !== "") {
    //button.click();
    form.submit();
    console.log("Form submitted with value:", input.value);
  }
});
