<?php

include("verificar_login.php");
include("conexao.php");




include("conexao.php");


// TOTAL DE LIVROS CADASTRADOS

$sql = "SELECT COUNT(*) FROM livros";

$totalLivros = $pdo->query($sql)->fetchColumn();


// TOTAL DE LIVROS DISPONÍVEIS

$sql = "SELECT COALESCE(SUM(estoque), 0) FROM livros";

$livrosDisponiveis = $pdo->query($sql)->fetchColumn();


// TOTAL DE LIVROS EMPRESTADOS

$sql = "SELECT COUNT(*)
        FROM emprestimos
        WHERE status = 'Emprestado'";

$livrosEmprestados = $pdo->query($sql)->fetchColumn();


// LIVRO MAIS EMPRESTADO

$sql = "SELECT livros.titulo,
               COUNT(emprestimos.id) AS quantidade
        FROM emprestimos
        INNER JOIN livros
        ON emprestimos.livro_id = livros.id
        GROUP BY livros.id, livros.titulo
        ORDER BY quantidade DESC
        LIMIT 1";

$stmt = $pdo->query($sql);

$livroMaisEmprestado = $stmt->fetch(PDO::FETCH_ASSOC);


// LISTA DE LIVROS

$sql = "SELECT *
        FROM livros
        ORDER BY titulo";

$livros = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Relatório - Biblioteca</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .relatorio-titulo {
            text-align: center;
            margin-bottom: 30px;
        }

        .relatorio-titulo h2 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .relatorio-titulo p {
            color: #8e6a61;
        }


        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }


        .card {
            flex: 1;
            background-color: white;
            padding: 25px;
            text-align: center;
            border-radius: 15px;
            border: 1px solid #ead0d3;
            box-shadow: 0 5px 15px rgba(91, 64, 56, 0.10);
        }


        .card h2 {
            font-size: 35px;
            margin: 0;
            color: #b77d8b;
        }


        .card p {
            margin-bottom: 0;
        }


        .mais-emprestado {
            background-color: #f8e5e8;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #ead0d3;
            margin-bottom: 30px;
            text-align: center;
        }


        .mais-emprestado h2 {
            margin-top: 0;
        }


        .mais-emprestado strong {
            color: #a96f7d;
            font-size: 20px;
        }


        .lista {
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #ead0d3;
            box-shadow: 0 5px 15px rgba(91, 64, 56, 0.10);
        }


        .lista h2 {
            margin-top: 0;
        }


        @media (max-width: 700px) {

            .cards {
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<header>

    <h1>♡ Relatório da Biblioteca ♡</h1>

    <p>Resumo dos livros e empréstimos</p>

</header>


<div class="container">


    <div class="relatorio-titulo">

        <h2>♡ Resumo</h2>

        <p>
            Confira as principais informações da biblioteca.
        </p>

    </div>



    <div class="cards">


        <div class="card">

            <h2>
                <?php echo $totalLivros; ?>
            </h2>

            <p>
                Livros cadastrados
            </p>

        </div>



        <div class="card">

            <h2>
                <?php echo $livrosDisponiveis; ?>
            </h2>

            <p>
                Livros disponíveis
            </p>

        </div>



        <div class="card">

            <h2>
                <?php echo $livrosEmprestados; ?>
            </h2>

            <p>
                Livros emprestados
            </p>

        </div>


    </div>



    <div class="mais-emprestado">

        <h2>♡ Livro mais emprestado</h2>


        <?php if ($livroMaisEmprestado): ?>

            <p>

                O livro que possui mais empréstimos é:

            </p>

            <p>

                <strong>
                    <?php echo $livroMaisEmprestado["titulo"]; ?>
                </strong>

            </p>

            <p>

                <?php echo $livroMaisEmprestado["quantidade"]; ?>

                empréstimo(s)

            </p>


        <?php else: ?>

            <p>
                Nenhum empréstimo cadastrado ainda. ♡
            </p>

        <?php endif; ?>

    </div>



    <div class="lista">

        <h2>♡ Livros cadastrados</h2>


        <table>

            <tr>

                <th>Título</th>

                <th>Autor</th>

                <th>Gênero</th>

                <th>Ano</th>

                <th>Editora</th>

                <th>Estoque</th>

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

                </tr>

            <?php endforeach; ?>

        </table>

    </div>



    <a class="voltar" href="index.php">
        ♡ Voltar para o início
    </a>

</div>

</body>

</html>