<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar</title>
</head>
<body>
    <h1>Akime Hotel</h1>
    <div>
        <h2>Criar Conta</h2>
        <form action="atividades/registar_processo.php" method="POST" id="registo">
            <label for="nome">Nome Completo</label>
            <input type="text" placeholder="Seu Nome" id="nome" name="nome" required>
            <br>

            <label for="email">Email</label>
            <input type="email" placeholder="email@exemplo.com" id="email" name="email" required>
            <br>

            <label for="password">Password</label>
            <input type="password" placeholder="********" id="password" name="password" required>
            <br>

            <label for="confirmar">Confirmar Password</label>
            <input type="password" placeholder="********" id="confirmar" name="confirmar" required>
            <br>

            <label for="nif">NIF</label>
            <input type="text" id="nif" name="nif" pattern="[0-9]{9}">
            <br>

            <label for="doc">Documento</label>
            <select name="doc" id="doc">
                <option value="Cartão de Cidadão">Cartão de Cidadão</option>
                <option value="Passaporte">Passaporte</option>
                <option value="Outros">Outros</option>
            </select>
            <br>

            <span>Já tens conta aqui? <a href="./login.php">Entra na sua Conta</a></span>
        </form>
    </div>
</body>
</html>