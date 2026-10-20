<?php

include("conexao.php");

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Recebe os dados enviados pelo formulário
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];
    $ano = $_POST["ano_publicacao"];
    $editora = $_POST["editora"];
    $estoque = $_POST["estoque"];

// Comando SQL para inserir um novo livro na tabela
    $sql = "INSERT INTO livros
            (titulo, autor, genero, ano_publicacao, editora, estoque)
            VALUES (?, ?, ?, ?, ?, ?)";

// Prepara o comando SQL para receber os valores
    $stmt = $pdo->prepare($sql);

// Executa o comando enviando os dados do livro
    $stmt->execute([
        $titulo,
        $autor,
        $genero,
        $ano,
        $editora,
        $estoque
    ]);

// Exibe uma mensagem e redireciona para a lista de livros
    echo "<script>
            alert('Livro cadastrado com sucesso!');
            window.location.href = 'lista_livros.php';
          </script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Cadastrar Livro - Biblioteca</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .formulario {
            width: 600px;
            max-width: 100%;
            margin: auto;
            padding: 30px;
        }

        .formulario h2 {
            text-align: center;
            margin-top: 0;
        }

        .formulario button {
            width: 100%;
            margin-top: 25px;
        }

    </style>

</head>

<body>

<header>

    <h1>♡ Cadastrar Livro ♡</h1>

    <p>Adicione um novo livro à biblioteca</p>

</header>


<div class="container">

    <div class="formulario">

        <h2>Novo livro</h2>

        <form method="POST">

            <label>Título:</label>

            <input
                type="text"
                name="titulo"
                required
            >


            <label>Autor:</label>

            <input
                type="text"
                name="autor"
                required
            >


            <label>Gênero:</label>

            <input
                type="text"
                name="genero"
                required
            >


            <label>Ano de publicação:</label>

            <input
                type="number"
                name="ano_publicacao"
                required
            >


            <label>Editora:</label>

            <input
                type="text"
                name="editora"
                required
            >


            <label>Quantidade em estoque:</label>

            <input
                type="number"
                name="estoque"
                min="0"
                required
            >


            <button type="submit">
                ♡ Cadastrar Livro
            </button>

        </form>


        <a class="voltar" href="index.php">
            ♡ Voltar para o início
        </a>

    </div>

</div>

</body>

</html>