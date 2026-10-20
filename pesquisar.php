<?php

include("verificar_login.php");
include("conexao.php");




include("conexao.php");

$pesquisa = "";

if (isset($_GET["pesquisa"])) {
    $pesquisa = $_GET["pesquisa"];
}

$sql = "SELECT * FROM livros
        WHERE titulo ILIKE ?
        OR autor ILIKE ?
        ORDER BY titulo";

$stmt = $pdo->prepare($sql);

$valorPesquisa = "%" . $pesquisa . "%";

$stmt->execute([
    $valorPesquisa,
    $valorPesquisa
]);

$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Pesquisar Livros - Biblioteca</title>

    <link rel="stylesheet" href="/projeto/style.css">

    <style>

        .pesquisa {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #ead0d3;
            box-shadow: 0 5px 15px rgba(91, 64, 56, 0.10);
            margin-bottom: 25px;
        }

        .pesquisa form {
            display: flex;
            gap: 10px;
        }

        .pesquisa input {
            flex: 1;
        }

        .pesquisa button {
            margin-top: 0;
        }

        .lista {
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #ead0d3;
            box-shadow: 0 5px 15px rgba(91, 64, 56, 0.10);
        }

        @media (max-width: 600px) {

            .pesquisa form {
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<header>

    <h1>♡ Pesquisar Livros ♡</h1>

    <p>Encontre um livro pelo título ou autor</p>

</header>


<div class="container">

    <div class="pesquisa">

        <h2>🔎 Procurar livro</h2>

        <form method="GET">

            <input
                type="text"
                name="pesquisa"
                placeholder="Digite o título ou autor"
                value="<?php echo $pesquisa; ?>"
            >

            <button type="submit">
                Pesquisar
            </button>

        </form>

    </div>


    <div class="lista">

        <?php if ($pesquisa != ""): ?>

            <h2>♡ Resultados da pesquisa</h2>

        <?php else: ?>

            <h2>♡ Livros cadastrados</h2>

        <?php endif; ?>


        <table>

            <tr>

                <th>Título</th>
                <th>Autor</th>
                <th>Gênero</th>
                <th>Ano</th>
                <th>Estoque</th>

            </tr>


            <?php if (count($livros) > 0): ?>

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
                            <?php echo $livro["estoque"]; ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="5">
                        Nenhum livro encontrado ♡
                    </td>

                </tr>

            <?php endif; ?>

        </table>

    </div>


    <a class="voltar" href="/projeto/index.php">
        ♡ Voltar para o início
    </a>

</div>

</body>

</html>