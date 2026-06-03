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
        <form action="">
            <label for="nome">Nome Completo</label>
            <input type="text" placeholder="Seu Nome" id="nome" required>
            <br>

            <label for="email">Email</label>
            <input type="email" placeholder="email@exemplo.com" id="email" required>
            <br>

            <label for="password">Password</label>
            <input type="password" placeholder="********" id="password" required>
            <br>

            <label for="confirmar">Confirmar Password</label>
            <input type="password" placeholder="********" id="confirmar" required>
            <br>

            <button type="submit">Registar</button>
            <br>

            <span>Já tens conta aqui? <a href="./login.php">Entra na sua Conta</a></span>
        </form>
    </div>
</body>
</html>