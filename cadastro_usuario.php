<?php

// Inclui a conexão com o banco de dados
include("conexao.php");

// Variável usada para guardar mensagens ao usuário
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Recebe os dados digitados no formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];

// Verifica se as senhas digitadas são diferentes
    if ($senha != $confirmar_senha) {

// Guarda uma mensagem caso as senhas não coincidam
        $mensagem = "As senhas não são iguais.";

    } else {

        $senha_segura = password_hash(
            $senha,
            PASSWORD_DEFAULT
        );

// Tenta cadastrar o usuário no banco
        try {

// Comando SQL para inserir um novo usuário
            $sql = "INSERT INTO usuarios
                    (nome, email, senha)
                    VALUES (?, ?, ?)";

            $stmt = $pdo->prepare($sql);
            
// Executa o comando com os dados do usuário
            $stmt->execute([
                $nome,
                $email,
                $senha_segura
            ]);


            echo "<script>
                    alert('Usuário cadastrado com sucesso! ♡');
                    window.location.href = 'login.php';
                  </script>";

        } catch (PDOException $e) {

            $mensagem = "Esse e-mail já está cadastrado.";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Criar Conta - Biblioteca</title>

    <link rel="stylesheet" href="/projeto/style.css">

    <style>

        body {
            min-height: 100vh;
            background-color: #fff8f5;
        }

        .cadastro-container {
            width: 400px;
            max-width: 90%;
            margin: 60px auto;
            background-color: white;
            padding: 35px;
            border-radius: 20px;
            border: 1px solid #ead0d3;
            box-shadow: 0 8px 25px rgba(91, 64, 56, 0.15);
        }

        .cadastro-topo {
            text-align: center;
            margin-bottom: 25px;
        }

        .cadastro-topo h1 {
            color: #a96f7d;
            font-size: 32px;
            font-weight: normal;
            margin-bottom: 5px;
        }

        .cadastro-topo p {
            color: #8e6a61;
        }

        .cadastro-container button {
            width: 100%;
            margin-top: 25px;
        }

        .mensagem {
            text-align: center;
            margin-top: 20px;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
        }

        .login-link a {
            color: #a96f7d;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>


<div class="cadastro-container">

    <div class="cadastro-topo">

        <h1>♡ Criar conta ♡</h1>

        <p>
            Faça seu cadastro para entrar na biblioteca
        </p>

    </div>


    <form method="POST">

        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            placeholder="Digite seu nome"
            required
        >


        <label>E-mail:</label>

        <input
            type="email"
            name="email"
            placeholder="Digite seu e-mail"
            required
        >


        <label>Senha:</label>

        <input
            type="password"
            name="senha"
            placeholder="Crie uma senha"
            required
        >


        <label>Confirmar senha:</label>

        <input
            type="password"
            name="confirmar_senha"
            placeholder="Digite a senha novamente"
            required
        >


        <button type="submit">
            ♡ Criar minha conta
        </button>

    </form>


    <?php if ($mensagem != ""): ?>

        <div class="mensagem">

            <?php echo $mensagem; ?>

        </div>

    <?php endif; ?>


    <div class="login-link">

        <p>
            Já possui uma conta?
        </p>

        <a href="/projeto/login.php">
            Voltar para o login ♡
        </a>

    </div>

</div>


</body>

</html>