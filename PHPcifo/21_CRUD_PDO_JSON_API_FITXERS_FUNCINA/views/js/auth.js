document.addEventListener("DOMContentLoaded", () => {
  //SESION CARGAR PAGINA
  /*   if (localStorage.getItem("adminLoggedIn") !== true) {
      window.location.href = "index.html";
    } */
  //logout
  document.querySelector("#logoutBtn").addEventListener("click", () => {
    localStorage.removeItem("adminLoggedIn");
    window.location.href = "login.html";
  });
});