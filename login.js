document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login-tab");
    const createForm = document.querySelector("#create-tab");

    document.querySelector("#linkCreateAccount").addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.classList.add("form-hidden");
        createForm.classList.remove("form-hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.classList.remove("form-hidden");
        createForm.classList.add("form-hidden");
    });
});