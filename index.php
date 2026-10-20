<?php
// verifica se o usuário está logado
include("verificar_login.php");
// faz a conexão com o banco de dados
include("conexao.php");

//conta o total de livros cadastrados
$sql = "SELECT COUNT(*) FROM livros";
$totalLivros = $pdo->query($sql)->fetchColumn();

//conta o total de livros disponíveis
$sql = "SELECT COALESCE(SUM(estoque), 0) FROM livros";
$livrosDisponiveis = $pdo->query($sql)->fetchColumn();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Biblioteca</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <img
        class="logo"
        src="Logótipo Catoteca_ Gato entre Livros.png"
        alt="Logo da Catoteca"
    >

    <p>Um cantinho especial para os seus livros</p>

    <?php if (isset($_SESSION["usuario_nome"])): ?>

        <div class="usuario">

            Olá, <?php echo $_SESSION["usuario_nome"]; ?> ♡

        </div>

        <a href="logout.php" class="botao-sair">
    ♡ Sair da conta
</a>

    <?php endif; ?>

</header>


<div class="container">

    <div class="cards">

        <div class="card">

            <h2>
                <?php echo $totalLivros; ?>
            </h2>

            <p>Livros cadastrados</p>

        </div>


        <div class="card">

            <h2>
                <?php echo $livrosDisponiveis; ?>
            </h2>

            <p>Livros disponíveis</p>

        </div>

    </div>


    <nav>

        <h2>♡ Menu da Biblioteca</h2>

        <a href="cadastrar_livro.php">
            ♡ Cadastrar livro
        </a>

        <a href="lista_livros.php">
            ♡ Lista de livros
        </a>

        <a href="pesquisar.php">
            ♡ Pesquisar livros
        </a>

        <a href="emprestimos.php">
            ♡ Empréstimos
        </a>

        <a href="relatorio.php">
            ♡ Relatório
        </a>

    </nav>

</div>

</body>

</html>


<div class="card">
    <h3>Sobre a Catoteca</h3>
    <p>Conheça um pouco mais sobre nossa biblioteca.</p>
    <a href="sobre.php" class="botao">Saiba mais</a>
</div>