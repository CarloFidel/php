/* document.addEventListener("DOMContentLoaded", () => {
  if (localStorage.getItem("adminLoggedIn") !== "true") {
    window.location.href = "login.html";
  }
}); */

const logoutBtn = document.querySelector("#logoutBtn");
if (logoutBtn) {
  document.querySelector("#logoutBtn").addEventListener("click", () => {
    localStorage.removeItem("adminLoggedIn");
    window.location.href = "login.html";
  });
}
