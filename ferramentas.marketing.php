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
    <title>Ferramentas de Marketing</title>
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
            width: 255px;
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
        .cards-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            height: 200px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            background-color: #28a745;
            color: white;
        }
        .card i {
            font-size: 40px;
            margin-bottom: 10px;
        }
        .card h3 {
            margin-top: 0;
        }
        .card p {
            margin: 0;
        }
        .card a {
            text-decoration: none;
            color: inherit;
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
            <a href="validate.php"><i class="fas fa-home"></i>Tela Inicial</a>
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
        <div class="cards-container">
            <!-- Google Ads Card -->
            <div class="card">
                <a href="google_ads.php">
                    <i class="fab fa-google"></i>
                    <h3>Google Ads</h3>
                    <p>Informações sobre Google Ads.</p>
                </a>
            </div>

            <!-- Meta Ads Card -->
            <div class="card">
                <a href="meta_ads.php">
                    <i class="fab fa-facebook"></i>
                    <h3>Meta Ads</h3>
                    <p>Informações sobre Meta Ads.</p>
                </a>
            </div>

            <!-- TikTok Ads Card -->
            <div class="card">
                <a href="tiktok_ads.php">
                    <i class="fab fa-tiktok"></i>
                    <h3>TikTok Ads</h3>
                    <p>Informações sobre TikTok Ads.</p>
                </a>
            </div>

            <!-- LinkedIn Ads Card -->
            <div class="card">
                <a href="linkedin_ads.php">
                    <i class="fab fa-linkedin"></i>
                    <h3>LinkedIn Ads</h3>
                    <p>Informações sobre LinkedIn Ads.</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
