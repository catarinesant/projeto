<?php

include("verificar_admin.php");
include("verificar_login.php");
include("conexao.php");

// Verifica se foi informado o ID do livro
if (isset($_GET["id"])) {

    $id = $_GET["id"];

    try {

        // Tenta excluir o livro pelo ID
        $sql = "DELETE FROM livros WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        // Se conseguiu excluir, volta para a lista
        header("Location: lista_livros.php?mensagem=excluido");
        exit;

    } catch (PDOException $e) {

        // Se o livro tiver empréstimos associados
        if ($e->getCode() == "23503") {

            header("Location: lista_livros.php?mensagem=possui_emprestimos");
            exit;

        } else {

            // Mensagem para outros erros
            die("Não foi possível excluir o livro.");

        }

    }

}

// Volta para a lista caso não exista um ID
header("Location: lista_livros.php");
exit;

?>