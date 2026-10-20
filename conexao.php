<?php

// Dados para conectar ao banco de dados
$host = "192.168.10.14";
$port = "5432";
$dbname = "biblioteca";
$user = "postgres";
$password = "ca201003";

//"testa a conexao com o postgres
try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password
    );

    // Configura o PDO para apresentar exceções quando ocorrerem erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Caso ocorra um erro na conexão, captura a exceção
    } catch (PDOException $e) {
// Exibe uma mensagem de erro e interrompe a execução
    die("Erro na conexão: " . $e->getMessage());
}
?>