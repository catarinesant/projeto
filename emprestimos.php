<?php

include("verificar_login.php");


include("conexao.php");


$mensagem = "";


// CADASTRAR EMPRÉSTIMO

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastrar"])) {

    $nome_pessoa = $_POST["nome_pessoa"];
    $livro_id = $_POST["livro_id"];
    $data_emprestimo = $_POST["data_emprestimo"];


    $sql = "SELECT estoque FROM livros WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$livro_id]);

    $livro = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$livro) {

        $mensagem = "Livro não encontrado.";

    } elseif ($livro["estoque"] <= 0) {

        $mensagem = "Esse livro não possui exemplares disponíveis.";

    } else {

        $sql = "INSERT INTO emprestimos
                (nome_pessoa, livro_id, data_emprestimo, data_devolucao, status)
                VALUES (?, ?, ?, NULL, 'Emprestado')";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $nome_pessoa,
            $livro_id,
            $data_emprestimo
        ]);


        $sql = "UPDATE livros
                SET estoque = estoque - 1
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$livro_id]);


        $mensagem = "Empréstimo cadastrado com sucesso! ♡";
    }
}



// DEVOLVER LIVRO

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["devolver"])) {

    $emprestimo_id = $_POST["emprestimo_id"];


    $sql = "SELECT * FROM emprestimos WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$emprestimo_id]);

    $emprestimo = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$emprestimo) {

        $mensagem = "Empréstimo não encontrado.";

    } elseif ($emprestimo["status"] == "Devolvido") {

        $mensagem = "Esse livro já foi devolvido.";

    } else {

        $sql = "UPDATE emprestimos
                SET status = 'Devolvido',
                    data_devolucao = CURRENT_DATE
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$emprestimo_id]);


        $sql = "UPDATE livros
                SET estoque = estoque + 1
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$emprestimo["livro_id"]]);


        $mensagem = "Livro devolvido com sucesso! ♡";
    }
}



// BUSCAR LIVROS

$sql = "SELECT * FROM livros ORDER BY titulo";

$livros = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);



// BUSCAR EMPRÉSTIMOS

$sql = "SELECT emprestimos.*, livros.titulo
        FROM emprestimos
        INNER JOIN livros ON emprestimos.livro_id = livros.id
        ORDER BY emprestimos.id DESC";

$emprestimos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Empréstimos - Biblioteca</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .formulario {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #ead0d3;
            box-shadow: 0 5px 15px rgba(91, 64, 56, 0.10);
            margin-bottom: 30px;
        }

        .formulario h2 {
            margin-top: 0;
        }

        .formulario button {
            width: 100%;
            margin-top: 25px;
        }

        .lista {
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #ead0d3;
            box-shadow: 0 5px 15px rgba(91, 64, 56, 0.10);
        }

        .devolver {
            background-color: #b77d8b;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            margin: 0;
            width: auto;
        }

        .devolver:hover {
            background-color: #8e5967;
        }

        .devolvido {
            color: #8e5967;
            font-weight: bold;
        }

    </style>

</head>

<body>

<header>

    <h1>♡ Empréstimos ♡</h1>

    <p>Controle de empréstimos e devoluções</p>

</header>


<div class="container">


    <?php if ($mensagem != ""): ?>

        <div class="mensagem">

            <?php echo $mensagem; ?>

        </div>

    <?php endif; ?>



<div class="formulario">

    <img
        class="imagem-emprestimo"
        src="Bibliotecário Gato a Entregar um Livro.png"
        alt="Gato realizando empréstimo de livro"
    >

    <h2>♡ Novo empréstimo</h2>


        <form method="POST">

            <input
                type="hidden"
                name="cadastrar"
                value="1"
            >


            <label>Nome da pessoa:</label>

            <input
                type="text"
                name="nome_pessoa"
                placeholder="Digite o nome"
                required
            >


            <label>Livro:</label>

            <select name="livro_id" required>

                <option value="">
                    Selecione um livro
                </option>


                <?php foreach ($livros as $livro): ?>

                    <option value="<?php echo $livro["id"]; ?>">

                        <?php echo $livro["titulo"]; ?>

                        - Estoque:
                        <?php echo $livro["estoque"]; ?>

                    </option>

                <?php endforeach; ?>

            </select>


            <label>Data do empréstimo:</label>

            <input
                type="date"
                name="data_emprestimo"
                required
            >


            <button type="submit">
                ♡ Cadastrar Empréstimo
            </button>

        </form>

    </div>



    <div class="lista">

        <h2>♡ Empréstimos cadastrados</h2>


        <table>

            <tr>

                <th>Pessoa</th>

                <th>Livro</th>

                <th>Data do empréstimo</th>

                <th>Data de devolução</th>

                <th>Status</th>

                <th>Ação</th>

            </tr>


            <?php foreach ($emprestimos as $emprestimo): ?>

                <tr>

                    <td>
                        <?php echo $emprestimo["nome_pessoa"]; ?>
                    </td>


                    <td>
                        <?php echo $emprestimo["titulo"]; ?>
                    </td>


                    <td>
                        <?php echo $emprestimo["data_emprestimo"]; ?>
                    </td>


                    <td>

                        <?php

                        if ($emprestimo["data_devolucao"] != "") {

                            echo $emprestimo["data_devolucao"];

                        } else {

                            echo "-";

                        }

                        ?>

                    </td>


                    <td>

                        <?php echo $emprestimo["status"]; ?>

                    </td>


                    <td>

                        <?php if ($emprestimo["status"] == "Emprestado"): ?>

                            <form method="POST">

                                <input
                                    type="hidden"
                                    name="devolver"
                                    value="1"
                                >

                                <input
                                    type="hidden"
                                    name="emprestimo_id"
                                    value="<?php echo $emprestimo["id"]; ?>"
                                >

                                <button
                                    type="submit"
                                    class="devolver"
                                >
                                    Devolver
                                </button>

                            </form>


                        <?php else: ?>

                            <span class="devolvido">
                                ✓ Devolvido
                            </span>

                        <?php endif; ?>

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