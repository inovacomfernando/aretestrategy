<?php
// db.php
$servername = "localhost";
$username = "root"; // ou o nome do seu usuário
$password = ""; // ou a senha do seu usuário
$dbname = "aretestrategy"; // substitua pelo nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Sistema</title>
    <style>
        body {
            font-family: arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            width: 100%;
            height: 100%;
        }
        .left-side {
            background-color: #142a19; /* Retângulo verde escuro */
            width: 35%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Alinhamento vertical */
            border-radius: 10px 0 0 10px;
        }
        .login-box {
            width: 65%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }
        .login-form {
            width: 100%;
            max-width: 300px;
            text-align: center;
        }
        .login-box h2 {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 90%;
            padding: 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #142a19;
        }
        .register-link {
            margin-top: 20px;
            color: #28a745;
            text-decoration: none;
            font-weight: medium;
            display: block;
        }
        .register-link:hover {
            color: #142a19;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container" style="display: flex; height: 100vh;">
        <div class="left-side" style="flex: 1; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <img src="logoarete.png" alt="Logotipo" style="max-width: 50%; margin-bottom: 10px; margin-top: 20%;"> <!-- Logotipo -->
            <h1 style="color: white; margin: 0;">Bem-vindo!</h1>
            <div style="text-align: center; margin-top: auto; color: white;">
                <p>Feito no <img src="bandeirabrasil.png" alt="Bandeira do Brasil" style="max-width: 30px; vertical-align: middle;"></p>
                <p style="margin-top: 40px; color: #fff;">Versão 1.0.0 | 2024</p> <!-- Aqui -->
            </div>
        </div>
        <div class="login-box" style="flex: 1;">
            <div class="login-form" style="padding: 20px;">
                <h2>Login</h2>
                <form action="validate.php" method="POST">
                    <label for="username">Usuário</label>
                    <input type="text" name="username" required>

                    <label for="password">Senha</label>
                    <input type="password" name="password" required>

                    <button type="submit">Entrar</button>
                </form>

                <a href="register.php" class="register-link">Ainda não tem cadastro? Clique aqui e tenha excelência nas suas estratégias</a>
            </div>
        </div>
    </div>
</body>
</html>
