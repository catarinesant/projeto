<?php

include("verificar_login.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sobre - Catálogo</title>

    <link rel="stylesheet" href="/projeto/projetostyle.css">

    <style>

        .sobre-intro {
            text-align: center;
            margin-bottom: 35px;
        }

        .sobre-intro h2 {
            font-size: 30px;
            color: #765047;
            margin-bottom: 10px;
        }

        .sobre-intro p {
            color: #8e6a61;
            font-size: 16px;
        }

        .sobre-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .sobre-card {
            background-color: white;
            padding: 30px;
            border-radius: 18px;
            border: 1px solid #ead0d3;
            box-shadow: 0 5px 15px rgba(91, 64, 56, 0.10);
            transition: 0.3s;
        }

        .sobre-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(91, 64, 56, 0.15);
        }

        .sobre-card .icone {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .sobre-card h2 {
            color: #a96f7d;
            font-weight: normal;
            margin-top: 0;
        }

        .sobre-card p {
            color: #765047;
            line-height: 1.7;
            text-align: justify;
        }

        .valores {
            margin: 0;
            padding-left: 20px;
            color: #765047;
            line-height: 2;
        }

        .valores li::marker {
            color: #b77d8b;
        }

        .voltar-sobre {
            display: block;
            width: fit-content;
            margin: 30px auto 0;
            padding: 11px 20px;
            background-color: #e8c1ca;
            color: #5b4038;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s;
        }

        .voltar-sobre:hover {
            background-color: #d7a5b1;
            transform: translateY(-2px);
        }

        @media (max-width: 700px) {

            .sobre-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>

<header>

    <h1>♡ Catoteca ♡</h1>

    <p>Conheça um pouco mais sobre a nossa biblioteca</p>

</header>


<div class="container">


    <div class="sobre-intro">

        <h2>♡ Sobre a Catoteca</h2>

        <p>
            Um espaço criado para organizar, cuidar e compartilhar
            histórias através dos livros.
        </p>

    </div>


<div class="sobre-card">

    <img
        class="imagem-sobre"
        src="Gato Sonolento no Cantinho da Leitura.png"
        alt="Gato lendo livros"
    >

    <h2>
        História
    </h2>

            <p>
                A Catoteca nasceu com a ideia de criar um espaço
                simples, organizado e acolhedor para reunir livros
                e facilitar o acesso à leitura. O projeto foi criado
                para ajudar no controle do acervo, dos empréstimos
                e das devoluções, tornando a organização da biblioteca
                mais prática.
            </p>

            <p>
                Mais do que organizar livros, a Catoteca busca criar
                um ambiente onde cada pessoa possa encontrar novas
                histórias, conhecimentos e momentos especiais através
                da leitura.
            </p>

        </div>


        <div class="sobre-card">

            <h2>
                Missão
            </h2>

            <p>
                Facilitar o acesso aos livros e tornar a organização
                da biblioteca mais simples, prática e agradável,
                incentivando o hábito da leitura e valorizando cada
                história presente em nosso acervo.
            </p>

        </div>


        <div class="sobre-card">

            <h2>
                Visão
            </h2>

            <p>
                Ser uma biblioteca organizada, acolhedora e acessível,
                proporcionando uma experiência agradável para quem
                deseja descobrir novos livros, compartilhar histórias
                e desenvolver o gosto pela leitura.
            </p>

        </div>


        <div class="sobre-card">

            <h2>
                Valores
            </h2>

            <ul class="valores">

                <li>Amor pela leitura</li>

                <li>Organização</li>

                <li>Respeito</li>

                <li>Acessibilidade</li>

                <li>Responsabilidade</li>

                <li>Compartilhamento de conhecimento</li>

                <li>Cuidado com os livros</li>

            </ul>

        </div>


    </div>


    <a class="voltar-sobre" href="/projeto/index.php">

        ♡ Voltar para o início

    </a>


</div>

</body>

</html>