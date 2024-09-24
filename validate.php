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
    header("Location:logout.php"); // Redirecionar para a página de login se não estiver logado
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location:logout.php"); // Redirecionar para a página de login
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Incluindo Font Awesome -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 380px;
            height: 150vh;
            background-color: #142a19;
            padding: 0;
            color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: block;
            flex-direction: column;
        }
        .logo {
            text-align: center;
            padding: 20px 0;
        }
        .user-info {
            text-align: center;
            padding: 15px;
            position: relative;
        }
        .user-info img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            transition: filter 0.3s;
        }
        .user-info:hover img {
            filter: brightness(0.7);
        }
        .upload-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            display: none;
        }
        .user-info:hover .upload-icon {
            display: block;
        }
        .sidebar h2 {
            margin: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin: 0;
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
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f0f0f0;
            position: relative;
        }
        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .dashboard {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s, background-color 0.3s, color 0.3s;
            cursor: pointer;
            position: relative;
        }
        .dashboard:hover {
            transform: translateY(-10px);
            background-color: #28a745;
            color: #fff;
        }
        .dashboard:hover h2, .dashboard:hover p {
            color: #fff;
        }
        .dashboard i {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #28a745; /* Ícone verde no canto superior esquerdo */
        }
        .logout-button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: block;
        }
        .logout-button:hover {
            background-color: #142a19;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="logoarete.png" alt="Logo" style="max-width: 70%; height: auto;"> <!-- Altere o caminho para o logo -->
        </div>
        <div class="user-info">
            <input type="file" id="file-input" style="display: none;">
            <label for="file-input">
                <img src="fernandoramalho.jpg" alt="Usuário"> <!-- Caminho da imagem de usuário -->
                <i class="fas fa-upload upload-icon"></i>
            </label>
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
            <a href="#google-analytics"><i class="fas fa-plug"></i>Google Analytics</a>
            <a href="#"><i class="fas fa-chart-bar"></i>Relatórios</a>
            <a href="#"><i class="fas fa-users"></i>Gerenciar Usuários</a>
            <a href="#"><i class="fas fa-cogs"></i>Configurações</a>
        </div>
        <a href="?logout=true" class="logout-button">Sair</a>
    </div>
    <div class="content">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Selecione uma das opções no menu para começar.</p>

        <div class="dashboard-container">
            <div id="seo" class="dashboard" onclick="window.location.href='seo_tools.php'">
                <i class="fas fa-search"></i>
                <h2>Ferramenta de SEO</h2>
                <p>Aqui você pode visualizar métricas de SEO e otimizações.</p>
            </div>
            <div id="marketing" class="dashboard" onclick="window.location.href='ferramentas.marketing.php'">
                <i class="fas fa-chart-line"></i>
                <h2>Ferramenta de Marketing</h2>
                <p>Aqui você pode visualizar campanhas e análises de marketing.</p>
            </div>
            <div id="redes-sociais" class="dashboard" onclick="window.location.href='redes_sociais.php'">
                <i class="fab fa-facebook"></i>
                <h2>Ferramenta de Redes Sociais</h2>
                <p>Aqui você pode visualizar interações e métricas das redes sociais.</p>
            </div>
            <div id="crm" class="dashboard" onclick="window.location.href='crm.php'">
                <i class="fas fa-user-friends"></i>
                <h2>Ferramenta de CRM</h2>
                <p>Aqui você pode visualizar dados de clientes e interações.</p>
            </div>
            <div id="inteligencia-mercado" class="dashboard" onclick="window.location.href='inteligencia_mercado.php'">
                <i class="fas fa-brain"></i>
                <h2>Ferramenta de Inteligência de Mercado</h2>
                <p>Aqui você pode visualizar dados de mercado e concorrentes.</p>
            </div>
            <div id="google-analytics" class="dashboard" style="cursor: pointer;" onclick="window.open('https://analytics.google.com', '_blank')">
                <i class="fas fa-plug"></i>
                <h2>Ferramenta de Google Analytics</h2>
                <p>Ao clicar, você será redirecionado ao Google Analytics para visualizar integrações e dados conectados.</p>
            </div>
            <div id="configuracoes" class="dashboard" onclick="window.location.href='configuracoes.php'">
            <i class="fas fa-cog"></i>
                <h2>Ferramenta de Configurações</h2>
                <p>Aqui você pode ajustar suas configurações de conta e sistema.</p>
            </div>
        </div>
    </div>
</body>
</html>

