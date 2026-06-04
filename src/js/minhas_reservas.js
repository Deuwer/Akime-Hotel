document.addEventListener("DOMContentLoaded", async() => {

async function listarReservas() {

    let resposta = await fetch("../atividades/lista_reservas.php");

    let reservas = await resposta.json();

    let tabela = document.getElementById("tabela_reservas");

    const estadosReserva = new Map();

    estadosReserva.set("Activa", "Reserva Ativa");
    estadosReserva.set("Cancelada", "Reserva Cancelada");
    estadosReserva.set(null, "Pendente");

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

        let estado = estadosReserva.get(reserva.res_estado);

        tabela.innerHTML += `
            <tr>
                <td>${reserva.res_id}</td>
                <td>${reserva.res_inicio}</td>
                <td>${reserva.res_fim}</td>
                <td>${estado}</td>
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