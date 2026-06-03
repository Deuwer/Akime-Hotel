<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Reserva</title>
</head>
<body>
    <h2>Nova Reserva</h2>

    <form id="reserva_form">
     <label for="quarto">Tipo de Quarto</label>
     <select name="" id="quarto" required>
        <option value="Único">Único</option>
        <option value="Duplo">Duplo</option>
        <option value="Casal">Casal</option>
        <option value="Família">Família</option>
     </select>

     <label for="quantidade">Quartos</label>
     <input type="number" step="1" id="quantidade" required>

     <label for="hospedes">Hóspedes</label>
     <input type="number" step="1" id="hospedes" required>
     <br>

     <label for="data_inicio">Data de início</label>
     <input type="date" id="data_inicio" required>

     <label for="data_fim">Data do fim</label>
     <input type="date" id="data_fim" required>

     <label for="nif">NIF</label>
     <input type="text" id="nif" pattern="[0-9]{9}">
     <br>

     <p> Preço Total: <span id="preco_total"></span></p>
     <button type="submit">Concluir a reserva</button>

    </form>

    <h3>Quartos Disponíveis</h3>
    <div></div>

</body>
</html>