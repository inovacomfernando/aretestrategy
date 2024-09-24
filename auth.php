<?php
session_start();

// Função para validar as credenciais
function validate_credentials($username, $password) {
    $valid_user = "admin";
    $valid_pass = "admin"; // A senha pode ser melhorada usando hashing
    return $username === $valid_user && $password === $valid_pass;
}

// Proteção contra ataques de CSRF
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Verificação de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    if (validate_credentials($username, $password)) {
        session_regenerate_id(true); // Prevenção contra fixation attacks
        $_SESSION['username'] = $username;
        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "Usuário ou senha incorretos!";
        exit;
    }
}
?>
