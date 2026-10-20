<?php

session_start();

include("conexao.php");

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($usuario && password_verify($senha, $usuario["senha"])) {

        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nome"] = $usuario["nome"];
        $_SESSION["usuario_tipo"] = $usuario["tipo"];

        header("Location: index.php");
        exit;

    } else {

        $mensagem = "E-mail ou senha incorretos.";

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Login - Biblioteca</title>

    <link rel="stylesheet" href="/projeto/style.css">

    <style>

        body {
            min-height: 100vh;
            background-color: #fff8f5;
        }

        .login {
            width: 400px;
            max-width: 90%;
            margin: 80px auto;
            background-color: white;
            padding: 35px;
            border-radius: 20px;
            border: 1px solid #ead0d3;
            box-shadow: 0 8px 25px rgba(91, 64, 56, 0.15);
        }

        .login-topo {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-topo h1 {
            color: #a96f7d;
            font-size: 34px;
            font-weight: normal;
            margin-bottom: 5px;
        }

        .login-topo p {
            color: #8e6a61;
        }

        .login button {
            width: 100%;
            margin-top: 25px;
        }

        .mensagem {
            text-align: center;
            margin-top: 20px;
        }

        .cadastro {
            width: auto;
            max-width: none;
            margin: 0;
            padding: 0;
            background: none;
            border: none;
            box-shadow: none;
            text-align: center;
        }

        .cadastro a {
            color: #a96f7d;
            text-decoration: none;
            font-weight: bold;
        }

        .cadastro a:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>


<div class="login">

    <div class="login-topo">

        <h1>♡ Biblioteca ♡</h1>

        <p>
            Entre no seu cantinho de leitura
        </p>

    </div>


    <form method="POST">

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
            placeholder="Digite sua senha"
            required
        >


        <button type="submit">
            ♡ Entrar
        </button>

    </form>


    <?php if ($mensagem != ""): ?>

        <div class="mensagem">

            <?php echo $mensagem; ?>

        </div>

    <?php endif; ?>


    <div class="cadastro">

        <p>
            Ainda não possui uma conta?
        </p>

        <a href="/projeto/cadastro_usuario.php">
            Criar minha conta ♡
        </a>

    </div>

</div>


</body>

</html>