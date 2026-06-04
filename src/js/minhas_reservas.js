document.addEventListener("DOMContentLoaded", async() => {

async function listarReservas() {

    let resposta = await fetch("../atividades/lista_reservas.php");

    let reservas = await resposta.json();

    let tabela = document.getElementById("tabela_reservas");

    tabela.innerHTML = "";

    if (reservas.length == 0) {

        tabela.innerHTML = `
            <tr>
                <td colspan="5">Não existem reservas.</td>
            </tr>
        `;

        return;
    }

    reservas.forEach((reserva) => {

        tabela.innerHTML += `
            <tr>
                <td>${reserva.res_id}</td>
                <td>${reserva.res_inicio}</td>
                <td>${reserva.res_fim}</td>
                <td>${reserva.res_estado ?? ""}</td>
                <td>
                    <a href="editar_reserva.php?id=${reserva.res_id}">
                        Editar
                    </a>
                    <a href="../atividades/cancelar_reserva.php?id=${reserva.res_id}">
                        Cancelar
                    </a>
                </td>
            </tr>
        `;
    });
}

listarReservas();
});