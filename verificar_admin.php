<?php

// Verifica se existe uma sessão iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está conectado
if (!isset($_SESSION["usuario_id"])) {

    header("Location: login.php");
    exit;
}

// Verifica se o usuário é administrador
if (!isset($_SESSION["usuario_tipo"]) ||
    $_SESSION["usuario_tipo"] !== "admin") {

    http_response_code(403);

    die("Acesso negado! Somente a administradora pode realizar esta ação.");
}

?>