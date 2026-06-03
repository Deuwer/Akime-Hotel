document.addEventListener("DOMContentLoaded", () => {
    console.log("main.js está a funcionar");

    const login = document.getElementById("login");

    login.addEventListener("submit", async() => {

        const email = document.getElementById("email");
        const password = document.getElementById("password");


        const dados_login = {
            email, 
            password
        };

        //Preparação para o fetch api

    })

    const registo = document.getElementById("registo");

    registo.addEventListener("submit", async() => {

        const nome = document.getElementById("nome");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const confirmar = document.getElementById("confirmar");

        const dados_registo = {
            nome,
            email,
            password,
            confirmar
        }

        // Preparação para o fetch api
    })
})