<?php

include("verificar_login.php");
include("verificar_admin.php");
include("conexao.php");

// Recebe o ID do livro pela URL
$id = $_GET["id"];

// Cria uma consulta para buscar o livro pelo ID
$sql = "SELECT * FROM livros WHERE id = ?";

// Prepara e executa a consulta no banco de dados
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

// Guarda os dados do livro encontrado
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o livro existe no banco de dados.
if (!$livro) {
    die("Livro não encontrado.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os novos dados preenchidos no formulário.
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];
    $ano = $_POST["ano_publicacao"];
    $editora = $_POST["editora"];
    $estoque = $_POST["estoque"];

    // Cria o comando SQL para atualizar os dados do livro.
    $sql = "UPDATE livros SET
            titulo = ?,
            autor = ?,
            genero = ?,
            ano_publicacao = ?,
            editora = ?,
            estoque = ?
            WHERE id = ?";

// Prepara o comando de atualização.
    $stmt = $pdo->prepare($sql);

// Envia os novos dados para o banco de dados.
    $stmt->execute([
        $titulo,
        $autor,
        $genero,
        $ano,
        $editora,
        $estoque,
        $id
    ]);

// Mostra uma mensagem e volta para a lista de livros.
    echo "<script>
            alert('Livro atualizado com sucesso!');
            window.location.href = 'lista_livros.php';
          </script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Livro - Biblioteca</title>

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

    <h1>♡ Editar Livro ♡</h1>

    <p>Altere as informações do livro</p>

</header>


<div class="container">

    <div class="formulario">

        <h2>Editar informações</h2>


        <form method="POST">

            <label>Título:</label>

            <input
                type="text"
                name="titulo"
                value="<?php echo $livro["titulo"]; ?>"
                required
            >


            <label>Autor:</label>

            <input
                type="text"
                name="autor"
                value="<?php echo $livro["autor"]; ?>"
                required
            >


            <label>Gênero:</label>

            <input
                type="text"
                name="genero"
                value="<?php echo $livro["genero"]; ?>"
                required
            >


            <label>Ano de publicação:</label>

            <input
                type="number"
                name="ano_publicacao"
                value="<?php echo $livro["ano_publicacao"]; ?>"
                required
            >


            <label>Editora:</label>

            <input
                type="text"
                name="editora"
                value="<?php echo $livro["editora"]; ?>"
                required
            >


            <label>Quantidade em estoque:</label>

            <input
                type="number"
                name="estoque"
                value="<?php echo $livro["estoque"]; ?>"
                min="0"
                required
            >


            <button type="submit">
                ♡ Salvar alterações
            </button>

        </form>


        <a class="voltar" href="lista_livros.php">
            ♡ Voltar para a lista
        </a>

    </div>

</div>

</body>

</html>