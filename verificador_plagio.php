<?php
// Credenciais de login simuladas
$valid_user = "admin";
$valid_pass = "admin";

// Iniciar sessão
session_start();

// Verificar se os dados foram enviados pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar as credenciais
    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['username'] = $username;
    } else {
        echo "Usuário ou senha incorretos!";
        exit;
    }
}

// Verificar se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: logout.php"); // Redirecionar para a página de login se não estiver logado
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: logout.php"); // Redirecionar para a página de login
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Verificador de Plágio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .sidebar {
            width: 200px;
            height: 150vh;
            background-color: #142a19;
            padding: 0;
            color: white;
            display: flex;
            flex-direction: column;
        }
        .logo {
            text-align: center;
            padding: 20px 0;
        }
        .user-info {
            text-align: center;
            padding: 15px;
        }
        .user-info img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }
        .sidebar h2 {
            margin: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 15px;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar a:hover {
            background-color: #28a745;
            color: white;
        }
        .logout-button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
            margin-top: auto;
        }
        .logout-button:hover {
            background-color: #142a19;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .verificador-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            margin-top: 20px;
        }
        textarea {
            width: 100%;
            height: 180px;
            font-size: 16px;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #bbb;
        }
        #checkButton {
            display: block;
            margin: 20px auto;
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        #checkButton:hover {
            background-color: #142a19;
        }
        #wordCount, #charCount {
            margin-top: 10px;
            font-size: 14px;
        }
        #suggestions {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #28a745;
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="logoarete.png" alt="Logo" style="max-width: 70%; height: auto;">
        </div>
        <div class="user-info">
            <img src="fernandoramalho.jpg" alt="Usuário">
            <p><?php echo htmlspecialchars($_SESSION['username']); ?></p>
        </div>
        <h2>Menu</h2>
        <div>
            <a href="validate.php"><i class="fas fa-home"></i>Tela Inicial</a> <!-- Tela Inicial adicionada -->
            <a href="#seo"><i class="fas fa-search"></i>SEO</a>
            <a href="#marketing"><i class="fas fa-chart-line"></i>Marketing</a>
            <a href="#redes-sociais"><i class="fab fa-facebook"></i>Redes Sociais</a>
            <a href="#crm"><i class="fas fa-user-friends"></i>CRM</a>
            <a href="#inteligencia-mercado"><i class="fas fa-brain"></i>Inteligência de Mercado</a>
            <a href="#Google Analytics"><i class="fas fa-plug"></i>Google Analytics</a>
            <a href="#"><i class="fas fa-chart-bar"></i> Relatórios</a>
            <a href="#"><i class="fas fa-users"></i> Gerenciar Usuários</a>
            <a href="#"><i class="fas fa-cogs"></i> Configurações</a>
            <a href="?logout=true" class="logout-button">Sair</a>
        </div>
    </div>

    <div class="content">
        <div class="verificador-container">
            <h1>Verificador de Plágio</h1>

            <textarea id="textContent" placeholder="Cole seu texto aqui para verificar plágio e obter sugestões de melhoria"></textarea>

            <div id="wordCount">Palavras: 0</div>
            <div id="charCount">Caracteres: 0</div>

            <button id="checkButton">Verificar Plágio e Obter Sugestões</button>

            <div id="suggestions" style="display:none;">
                <h3>Sugestões de Melhorias</h3>
                <p id="suggestionText"></p>
            </div>
        </div>
    </div>

    <script>
        // Função para contar palavras e caracteres
        function countWordsAndChars(text) {
            let words = text.trim().split(/\s+/).filter(word => word.length > 0).length;
            let chars = text.length;
            return { words, chars };
        }

        document.getElementById("textContent").addEventListener("input", function() {
            let text = this.value;
            let { words, chars } = countWordsAndChars(text);

            document.getElementById("wordCount").textContent = "Palavras: " + words;
            document.getElementById("charCount").textContent = "Caracteres: " + chars;
        });

        // Função para verificar plágio e obter sugestões de melhoria (simulada)
        document.getElementById("checkButton").addEventListener("click", function() {
            let text = document.getElementById("textContent").value;

            if (text.trim() === "") {
                alert("Por favor, cole um texto antes de verificar!");
                return;
            }

            // Simulação da verificação de plágio e IA generativa para sugestão de melhorias
            setTimeout(function() {
                // Simulando o resultado do plágio e das sugestões
                let plagiarismDetected = Math.random() < 0.3; // 30% chance de plágio detectado
                let suggestions = "Sugestão gerada por IA: melhore a clareza ao reformular as sentenças.";

                if (plagiarismDetected) {
                    alert("Plágio detectado! Por favor, revise seu texto.");
                } else {
                    alert("Nenhum plágio detectado!");
                }

                document.getElementById("suggestions").style.display = "block";
                document.getElementById("suggestionText").textContent = suggestions;
            }, 2000); // Simulação de tempo de processamento
        });
    </script>
</body>
</html>
