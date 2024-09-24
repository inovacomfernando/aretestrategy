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
    <title> 60 Ferramentas de SEO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 255px;
            height: 380vh;
            background-color: #142a19;
            padding: 0;
            color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
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
        .tool-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .tool-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, background-color 0.3s;
            cursor: pointer;
        }
        .tool-card:hover {
            transform: translateY(-5px);
            background-color: #28a745;
            color: white;
        }
        .tool-card i {
            font-size: 24px;
            margin-bottom: 10px;
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
            margin: 20px auto;
        }
        .logout-button:hover {
            background-color: #142a19;
        }
        /* Novo estilo para o botão de voltar */
        .back-button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            float: right;
        }
        .back-button:hover {
            background-color: #142a19;
        }
        h1 {
            display: inline-block;
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
            <div>
            <a href="#"><i class="fas fa-chart-bar"></i> Relatórios</a>
            <a href="#"><i class="fas fa-users"></i> Gerenciar Usuários</a>
            <a href="#"><i class="fas fa-cogs"></i> Configurações</a>
        </div>
        </div>
        <a href="?logout=true" class="logout-button">Sair</a>
    </div>
    <div class="content">
        <h1> 60 Ferramentas de SEO</h1>
        <!-- Botão de Voltar -->
        <a href="validate.php" class="back-button">Voltar para Tela Inicial</a>

        <div class="tool-container">
    <?php
    $tools = [
        ["name" => "Reescritor de Artigos", "icon" => "fas fa-file-alt", "file" => "reescritor_artigos.php"],
        ["name" => "Verificador de Plágio", "icon" => "fas fa-check-circle", "file" => "verificador_plagio.php"],
        ["name" => "Criador de Backlinks", "icon" => "fas fa-link", "file" => "criador_backlinks.php"],
        ["name" => "Gerador de Meta Tag", "icon" => "fas fa-tags", "file" => "gerador_meta.php"],
        ["name" => "Analisador de Meta Tags", "icon" => "fas fa-info-circle", "file" => "analisador_meta.php"],
        ["name" => "Verificador de Posição de Palavra-chave", "icon" => "fas fa-search", "file" => "verificador_posicao.php"],
        ["name" => "Gerador Robots.txt", "icon" => "fas fa-file", "file" => "gerador_robots.php"],
        ["name" => "Gerador de Sitemap XML", "icon" => "fas fa-sitemap", "file" => "gerador_sitemap.php"],
        ["name" => "Verificador de Backlinks", "icon" => "fas fa-external-link-alt", "file" => "verificador_backlinks.php"],
        ["name" => "Verificador de Classificação Alexa", "icon" => "fas fa-chart-bar", "file" => "verificador_alexa.php"],
        ["name" => "Contador de Palavras", "icon" => "fas fa-sort-numeric-up", "file" => "contador_palavras.php"],
        ["name" => "Ferramenta de Ping Online", "icon" => "fas fa-bullhorn", "file" => "ping_online.php"],
        ["name" => "Analisador de Links", "icon" => "fas fa-link", "file" => "analisador_links.php"],
        ["name" => "Verificador de PageRank", "icon" => "fas fa-chart-line", "file" => "verificador_pagerank.php"],
        ["name" => "Meu Endereço IP", "icon" => "fas fa-globe", "file" => "meu_endereco_ip.php"],
        ["name" => "Verificador de Densidade de Palavras-chave", "icon" => "fas fa-key", "file" => "verificador_densidade.php"],
        ["name" => "Verificador de Malware do Google", "icon" => "fas fa-shield-alt", "file" => "verificador_malware.php"],
        ["name" => "Verificador de Idade de Domínio", "icon" => "fas fa-calendar-alt", "file" => "verificador_idade.php"],
        ["name" => "Verificador Whois", "icon" => "fas fa-user-secret", "file" => "verificador_whois.php"],
        ["name" => "Domínio em IP", "icon" => "fas fa-network-wired", "file" => "dominio_em_ip.php"],
        ["name" => "Verificador de Listagem Dmoz", "icon" => "fas fa-list-alt", "file" => "verificador_dmoz.php"],
        ["name" => "Ferramenta de Reescrita de URL", "icon" => "fas fa-recycle", "file" => "reescrita_url.php"],
        ["name" => "www Verificador de Redirecionamento", "icon" => "fas fa-check-double", "file" => "verificador_redirecionamento.php"],
        ["name" => "Verificador Mozrank", "icon" => "fas fa-chart-pie", "file" => "verificador_mozrank.php"],
        ["name" => "Codificador/Decodificador de URL", "icon" => "fas fa-code", "file" => "codificador_url.php"],
        ["name" => "Verificador de Status do Servidor", "icon" => "fas fa-server", "file" => "verificador_status.php"],
        ["name" => "Simulador de Resolução de Tela", "icon" => "fas fa-desktop", "file" => "simulador_resolucao.php"],
        ["name" => "Verificador de Tamanho de Página", "icon" => "fas fa-file-alt", "file" => "verificador_tamanho.php"],
        ["name" => "Verificador de Domínio de IP Reverso", "icon" => "fas fa-network-wired", "file" => "verificador_ip_reverso.php"],
        ["name" => "Pesquisa na Lista Negra", "icon" => "fas fa-list-alt", "file" => "pesquisa_lista_negra.php"],
        ["name" => "Verificador AVG Antivírus", "icon" => "fas fa-shield-virus", "file" => "verificador_avg.php"],
        ["name" => "Calculadora de Preço de Link", "icon" => "fas fa-calculator", "file" => "calculadora_preco.php"],
        ["name" => "Gerador de Capturas de Tela de Sites", "icon" => "fas fa-camera", "file" => "gerador_capturas.php"],
        ["name" => "Verificador de Hospedagem de Domínio", "icon" => "fas fa-hotel", "file" => "verificador_hospedagem.php"],
        ["name" => "Obter Código Fonte da Página", "icon" => "fas fa-code-branch", "file" => "obter_codigo_fonte.php"],
        ["name" => "Verificador de Índice do Google", "icon" => "fas fa-search", "file" => "verificador_indice.php"],
        ["name" => "Verificador de Contagem de Links de Sites", "icon" => "fas fa-link", "file" => "verificador_contagem_links.php"],
        ["name" => "Verificador de IP de Classe C", "icon" => "fas fa-sitemap", "file" => "verificador_ip_classe_c.php"],
        ["name" => "Gerador MD5 Online", "icon" => "fas fa-key", "file" => "gerador_md5.php"],
        ["name" => "Verificador de Velocidade de Página", "icon" => "fas fa-tachometer-alt", "file" => "verificador_velocidade.php"],
        ["name" => "Verificador de Proporção de Código para Texto", "icon" => "fas fa-code", "file" => "verificador_proporcao.php"],
        ["name" => "Encontrar Registros DNS", "icon" => "fas fa-database", "file" => "encontrar_dns.php"],
        ["name" => "O que é Meu Navegador", "icon" => "fas fa-browsers", "file" => "meu_navegador.php"],
        ["name" => "Privacidade de E-mail", "icon" => "fas fa-envelope", "file" => "privacidade_email.php"],
        ["name" => "Verificador de Cache do Google", "icon" => "fas fa-history", "file" => "verificador_cache.php"],
        ["name" => "Localizador de Links Quebrados", "icon" => "fas fa-broken-link", "file" => "localizador_links_quebrados.php"],
        ["name" => "Simulador de Aranha de Mecanismo de Busca", "icon" => "fas fa-spider", "file" => "simulador_aranha.php"],
        ["name" => "Ferramenta de Sugestão de Palavras-chave", "icon" => "fas fa-lightbulb", "file" => "sugestao_palavras_chave.php"],
        ["name" => "Verificador de Autoridade de Domínio", "icon" => "fas fa-shield-alt", "file" => "verificador_autoridade_dominio.php"],
        ["name" => "Verificador de Autoridade de Página", "icon" => "fas fa-shield", "file" => "verificador_autoridade_pagina.php"],
    ];

    foreach ($tools as $tool) {
        echo "<div class='tool-card' onclick=\"window.location.href='{$tool['file']}'\" style='cursor: pointer;'>
                <i class='{$tool['icon']}'></i>
                <p>{$tool['name']}</p>
              </div>";
    }
    ?>
</div>
