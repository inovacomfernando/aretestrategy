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

<?php
// Iniciar sessão
session_start();

// Destruir sessão e redirecionar para a tela de login
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            flex-direction: column;
            border-radius: 10px 0 0 10px;
        }
        .logout-box {
            width: 65%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }
        .logout-box h2 {
            margin-bottom: 20px;
        }
        .message {
            font-size: 1.2em;
            margin: 20px 0;
        }
        button {
            width: 100%;
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
        .waving-hand {
            font-size: 2em;
            animation: wave 1s infinite;
        }
        @keyframes wave {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <div class="container" style="display: flex; height: 100vh;">
        <div class="left-side" style="flex: 1; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <img src="logoarete.png" alt="Logotipo" style="max-width: 50%; margin-bottom: 10px; margin-top: 20%;"> <!-- Logotipo -->
            <h1 style="color: white; text-align: center;">Até logo! <i class="fas fa-hand-wave waving-hand"></i></h1>
            <div style="text-align: center; margin-top: auto; color: white;">
                <p>Feito no <img src="bandeirabrasil.png" alt="Bandeira do Brasil" style="max-width: 30px; vertical-align: middle;"></p>
                <p style="margin-top: 30px;">Esperamos vê-lo em breve.</p>
            </div>
        </div>
        <div class="logout-box" style="flex: 1; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <h2>Você foi desconectado.</h2>
            <a href="login.php"><button>Voltar ao Login</button></a>
        </div>
    </div>
</body>
</html>
