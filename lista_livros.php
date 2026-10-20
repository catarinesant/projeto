<?php

include("verificar_login.php");
include("conexao.php");


include("conexao.php");

$sql = "SELECT * FROM livros ORDER BY titulo";
$livros = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Lista de Livros - Biblioteca</title>

    <link rel="stylesheet" href="/projeto/style.css">

</head>

<body>

<header>

    <h1>♡ Lista de Livros ♡</h1>

    <p>Todos os livros cadastrados na biblioteca</p>

</header>


<div class="container">

    <div class="lista">

        <a class="cadastrar" href="/projeto/cadastrar_livro.php">
            ♡ Cadastrar novo livro
        </a>

        <table>

            <tr>

                <th>Título</th>
                <th>Autor</th>
                <th>Gênero</th>
                <th>Ano</th>
                <th>Editora</th>
                <th>Estoque</th>
                <th>Ações</th>

            </tr>


            <?php foreach ($livros as $livro): ?>

                <tr>

                    <td>
                        <?php echo $livro["titulo"]; ?>
                    </td>

                    <td>
                        <?php echo $livro["autor"]; ?>
                    </td>

                    <td>
                        <?php echo $livro["genero"]; ?>
                    </td>

                    <td>
                        <?php echo $livro["ano_publicacao"]; ?>
                    </td>

                    <td>
                        <?php echo $livro["editora"]; ?>
                    </td>

                    <td>
                        <?php echo $livro["estoque"]; ?>
                    </td>

                    <td>

                        <a
                            class="editar"
                            href="/projeto/editar_livro.php?id=<?php echo $livro["id"]; ?>"
                        >
                            Editar
                        </a>

                        <a
                            class="excluir"
                            href="/projeto/excluir_livro.php?id=<?php echo $livro["id"]; ?>"
                            onclick="return confirm('Tem certeza que deseja excluir este livro?');"
                        >
                            Excluir
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    </div>


    <a class="inicio" href="/projeto/index.php">
        ♡ Voltar para o início
    </a>

</div>

</body>

</html>