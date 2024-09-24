<?php
$servername = "localhost"; // geralmente é localhost
$username = "root"; // o nome de usuário padrão do MySQL no XAMPP
$password = ""; // geralmente a senha está vazia para o root no XAMPP
$dbname = "aretestrategy"; // substitua pelo nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conexão bem-sucedida";
?>
