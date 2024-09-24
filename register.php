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

// Inicializar variável para mensagem
$mensagem = "";

// Processar o cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $usuario = $_POST['username'];
    $senha = password_hash($_POST['password'], PASSWORD_BCRYPT); // Criptografar a senha

    // Preparar a consulta
    $sql = "INSERT INTO usuarios (nome_completo, email, usuario, senha) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação da consulta falhou
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("ssss", $nome, $email, $usuario, $senha);

    if ($stmt->execute()) {
        $mensagem = "Cadastro realizado com sucesso!"; // Definir mensagem de sucesso
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
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
        .register-box {
            width: 65%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }
        .register-form {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
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
        .login-link {
            margin-top: 20px;
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
            display: block;
        }
        .login-link:hover {
            color: #142a19;
            text-decoration: underline;
        }

        /* Estilos para o modal */
        .modal {
            display: <?php echo $mensagem ? 'block' : 'none'; ?>; /* Mostrar se houver mensagem */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container" style="display: flex; height: 100vh;">
        <div class="left-side" style="flex: 1; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <img src="logoarete.png" alt="Logotipo" style="max-width: 50%; margin-bottom: 10px; margin-top: 20%;"> <!-- Logotipo -->
            <h1 style="color: white; margin: 0;">Cadastre-se!</h1>
            <div style="text-align: center; margin-top: auto; color: white;">
                <p>Feito no <img src="bandeirabrasil.png" alt="Bandeira do Brasil" style="max-width: 30px; vertical-align: middle;"></p>
                <p style="margin-top: 40px; color: #fff;">Versão 1.0.0 | 2024</p> <!-- Aqui -->
            </div>
        </div>
        <div class="register-box" style="flex: 1;">
            <div class="register-form" style="padding: 20px;">
                <h2>Cadastro</h2>
                <form action="" method="POST">
                    <label for="name">Nome Completo</label>
                    <input type="text" name="name" required>

                    <label for="email">E-mail</label>
                    <input type="email" name="email" required>

                    <label for="username">Usuário</label>
                    <input type="text" name="username" required>

                    <label for="password">Senha</label>
                    <input type="password" name="password" required>

                    <button type="submit">Cadastrar</button>
                </form>

                <!-- Link para voltar à página de login -->
                <a href="login.php" class="login-link">Já tem uma conta? Faça login aqui</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal">
        <div class="modal-content">
            <span class="close" onclick="this.parentElement.parentElement.style.display='none';">&times;</span>
            <p><?php echo $mensagem; ?></p>
        </div>
    </div>

    <script>
        // Fechar o modal ao clicar fora dele
        window.onclick = function(event) {
            var modal = document.querySelector('.modal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
