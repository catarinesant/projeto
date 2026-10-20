<?php

// Inicia a sessão do usuário
session_start();

// Apaga os dados da sessão
session_unset();

// Encerra a sessão
session_destroy();

// Volta para a tela de login
header("Location: login.php");
exit;

?>