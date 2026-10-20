# Sistema de Gerenciamento de Biblioteca

Sistema web desenvolvido em PHP para organizar o acervo de uma biblioteca e controlar livros, usuários e empréstimos. Permite cadastrar e pesquisar livros, registrar empréstimos e devoluções, acompanhar o estoque e consultar relatórios.

## Funcionalidades

- Cadastro, listagem, edição e exclusão de livros;
- Pesquisa de livros por título ou autor, inclusive por correspondências parciais;
- Cadastro de usuários, login e logout;
- Proteção das páginas internas para usuários autenticados;
- Registro de empréstimos e devoluções;
- Atualização automática do estoque após empréstimos e devoluções;
- Relatório com totais do acervo, livros disponíveis, empréstimos ativos e livro mais emprestado;
- Interface responsiva com identidade visual em tons suaves.

## Requisitos

### Funcionais

| Código | Requisito |
|---|---|
| RF01 | Permitir que o usuário crie uma conta com nome, e-mail, senha e confirmação de senha. |
| RF02 | Impedir o cadastro de e-mails já utilizados. |
| RF03 | Permitir login com e-mail e senha. |
| RF04 | Encerrar a sessão quando o usuário solicitar logout. |
| RF05 | Restringir o acesso às páginas internas a usuários autenticados. |
| RF06 | Permitir cadastrar livros com título, autor, gênero, ano de publicação, editora e estoque. |
| RF07 | Listar os livros cadastrados e apresentar seus dados principais. |
| RF08 | Permitir editar as informações de um livro. |
| RF09 | Permitir excluir um livro, solicitando confirmação antes da ação. |
| RF10 | Pesquisar livros por título ou autor, inclusive por correspondências parciais. |
| RF11 | Registrar empréstimos informando a pessoa, o livro e a data do empréstimo. |
| RF12 | Verificar se há exemplares disponíveis antes de registrar um empréstimo. |
| RF13 | Reduzir em uma unidade o estoque disponível quando um livro for emprestado. |
| RF14 | Permitir registrar a devolução de um empréstimo ativo. |
| RF15 | Atualizar o status, registrar a data de devolução e devolver uma unidade ao estoque. |
| RF16 | Impedir que um empréstimo já devolvido seja devolvido novamente. |
| RF17 | Apresentar um relatório com informações gerais do acervo e dos empréstimos. |

### Não funcionais

| Código | Requisito |
|---|---|
| RNF01 | Ser desenvolvido em PHP e utilizar PostgreSQL como banco de dados. |
| RNF02 | Utilizar PDO para acessar o banco de dados. |
| RNF03 | Armazenar as senhas com `password_hash()` e verificá-las com `password_verify()`. |
| RNF04 | Utilizar sessões para manter a autenticação do usuário. |
| RNF05 | Construir a interface com HTML e CSS, adaptando-a a telas menores. |
| RNF06 | Armazenar livros, usuários e empréstimos em um banco de dados relacional. |
| RNF07 | Exibir mensagens que indiquem o resultado das operações realizadas. |

## Tecnologias utilizadas

- **PHP** — lógica da aplicação, processamento de formulários e sessões;
- **PostgreSQL** — armazenamento dos dados;
- **PDO** — conexão e operações com o banco de dados;
- **HTML** — estrutura das páginas;
- **CSS** — estilização e adaptação da interface.

## Banco de dados

O banco de dados utilizado é `biblioteca` e contém três tabelas principais:

- **`livros`** — armazena título, autor, gênero, ano de publicação, editora e estoque;
- **`emprestimos`** — registra a pessoa, o livro, as datas e o status do empréstimo;
- **`usuarios`** — armazena nome, e-mail e senha dos usuários.

A tabela `emprestimos` relaciona cada empréstimo a um livro pelo campo `livro_id`. O e-mail dos usuários deve ser único.

## Pré-requisitos

- PHP com suporte a PDO e PostgreSQL;
- PostgreSQL;
- Servidor local compatível com PHP;
- Navegador atualizado.

## Como executar

1. Clone o repositório e acesse a pasta do projeto:

   ```bash
   git clone https://github.com/catarinesant/projeto.git
   cd projeto
   ```

2. Crie o usuário e o banco de dados no PostgreSQL:

   ```bash
   sudo -u postgres psql
   ```

   No console do PostgreSQL, execute:

   ```sql
   CREATE USER biblioteca WITH PASSWORD 'biblioteca';
   CREATE DATABASE biblioteca OWNER biblioteca;
   ```

3. Importe o arquivo `dump.sql`:

   ```bash
   psql -U biblioteca -d biblioteca -f dump.sql
   ```

4. Confira as configurações de conexão no arquivo `conexao.php`:

   ```php
   $host = "localhost";
   $port = "5432";
   $dbname = "biblioteca";
   $user = "biblioteca";
   $password = "biblioteca";
   ```

5. Inicie o servidor PHP na pasta do projeto:

   ```bash
   php -S localhost:8000
   ```

6. Acesse a aplicação em [http://localhost:8000](http://localhost:8000).

## Observação

Os comandos de criação do banco e as credenciais acima são exemplos para execução local. Ajuste as configurações de acordo com o ambiente utilizado.
=======

## Observação

Os comandos de criação do banco e as credenciais acima são exemplos para execução local. Ajuste as configurações de acordo com o ambiente utilizado.
=======

## Tabela livros
A tabela é responsável por armazenar os livros cadastrados.
Campos utilizados:
Campo
Função
id
Identificação do livro
titulo
Título do livro
autor
Autor
genero
Gênero literário
ano_publicacao
Ano de publicação
editora
Editora
estoque
Quantidade disponível

**O campo id é utilizado como chave primária e possui incremento automático.**

## Tabela emprestimos
Essa tabela é responsável pelo controle dos empréstimos.
Campos:
Campo
Função
id
Identificação do empréstimo
nome_pessoa
Pessoa que pegou o livro
livro_id
Livro emprestado
data_emprestimo
Data do empréstimo
data_devolucao
Data da devolução
status
Situação do empréstimo

**O campo livro_id possui uma chave estrangeira relacionada à tabela livros.
Dessa forma, cada empréstimo fica relacionado a um livro cadastrado.**

## Tabela usuarios
Foi criada para permitir o sistema de login.
Campos:
Campo
Função
id
Identificação do usuário
nome
Nome do usuário
email
E-mail para login
senha
Senha do usuário

**O e-mail foi configurado como único para evitar o cadastro de duas contas com o mesmo endereço.
As senhas são armazenadas utilizando password_hash(), aumentando a segurança do sistema.**

## Conexão com o banco
Foi criado o arquivo:
conexao.php
Ele é responsável por realizar a conexão entre o PHP e o banco de dados PostgreSQL.
Foi utilizado o PDO e configurado o sistema para apresentar erros de conexão quando necessário.
A conexão é utilizada pelas páginas que precisam acessar ou modificar os dados do banco.

## Página inicial
A página inicial é o ponto principal do sistema.
Nela são exibidas informações gerais da biblioteca, como:
Quantidade de livros cadastrados;
Quantidade de livros disponíveis;
Menu de navegação.
O menu permite acessar as principais funções do sistema:
Cadastrar livro;
Lista de livros;
Pesquisar livros;
Empréstimos;
Relatório;
Sair da conta.
A página também foi estilizada para seguir o padrão visual do projeto.

## Cadastro de livros
Foi criada a página:
cadastrar_livro.php
Nela é possível cadastrar um novo livro.
O formulário possui os seguintes campos:
Título;
Autor;
Gênero;
Ano de publicação;
Editora;
Quantidade em estoque.
Depois do preenchimento do formulário, os dados são enviados para o banco de dados.
Após o cadastro, o sistema apresenta uma mensagem de confirmação e direciona o usuário para a lista de livros.

## Lista de livros
Foi criada a página:
lista_livros.php
Essa página apresenta todos os livros cadastrados no banco de dados.
As informações exibidas são:
Título;
Autor;
Gênero;
Ano;
Editora;
Estoque.

**Também foram adicionadas ações para cada livro:
Editar
Permite alterar as informações cadastradas.
Excluir
Permite remover um livro do sistema após uma confirmação.
A lista é organizada em ordem alfabética pelo título.**

## Edição de livros
Foi criada a página:
editar_livro.php
Essa página recebe o ID do livro e busca suas informações no banco de dados.
Os dados são carregados automaticamente no formulário, permitindo que o usuário altere:
Título;
Autor;
Gênero;
Ano;
Editora;
Estoque.

**Após salvar, o sistema atualiza as informações no banco de dados e retorna para a lista de livros.**

## Exclusão de livros
Foi criada a página:
excluir_livro.php

**A exclusão é realizada utilizando o ID do livro.
Na lista de livros foi adicionada uma confirmação antes da exclusão, evitando que o usuário remova um livro acidentalmente.
Após a exclusão, o usuário retorna automaticamente para a lista.**

## Pesquisa de livros
Foi criada a página:
pesquisar.php
O sistema permite pesquisar livros através de:
Título;
Autor.

**A pesquisa utiliza ILIKE, permitindo localizar os livros mesmo quando o usuário não digita exatamente o nome completo.
Os resultados são apresentados em uma tabela com as informações principais do livro.
Caso nenhum resultado seja encontrado, o sistema informa que nenhum livro foi localizado.**

## Sistema de empréstimos
Foi criada a página:
emprestimos.php
Essa é uma das principais funcionalidades do sistema.
Para realizar um empréstimo, o usuário informa:
Nome da pessoa;
Livro;
Data do empréstimo.

**O sistema verifica se o livro existe e se possui exemplares disponíveis.
Quando o empréstimo é realizado:
O empréstimo é cadastrado;
O status recebe Emprestado;
A quantidade do estoque é diminuída em 1.
Isso permite que o sistema controle automaticamente a disponibilidade dos livros.**

## Devolução de livros
O sistema também possui controle de devoluções.
Quando um livro está com o status:
Emprestado
aparece o botão:
Devolver
Ao realizar a devolução:
O status passa para Devolvido;
A data de devolução é registrada;
A quantidade do estoque aumenta em 1.
**O sistema também verifica se o empréstimo já foi devolvido, evitando que o mesmo livro seja devolvido duas vezes no sistema.**

## Relatório
Foi criada a página:
relatorio.php
O relatório apresenta um resumo das informações da biblioteca.
São exibidos:
Total de livros cadastrados;
Total de livros disponíveis;
Quantidade de livros atualmente emprestados;
Livro que possui mais empréstimos;
Lista completa dos livros.
**O relatório utiliza consultas SQL para buscar os dados diretamente do banco de dados.
Dessa forma, as informações apresentadas são atualizadas conforme novos livros e empréstimos são cadastrados.**

## Sistema de usuários
Além do gerenciamento dos livros, foi desenvolvido um sistema simples de usuários.
Foi criada a página:
cadastro_usuario.php
Nela o usuário pode informar:
Nome;
E-mail;
Senha;
Confirmação da senha.
O sistema verifica se as duas senhas são iguais antes de realizar o cadastro.
Também existe uma verificação para evitar que um e-mail já cadastrado seja utilizado novamente.

## Sistema de login
Foi criada a página:
login.php
O usuário informa:
E-mail;
Senha.
O sistema consulta o banco de dados e verifica as informações utilizando password_verify().
Quando o login é realizado corretamente, são armazenadas informações do usuário em uma sessão.
Após o login, o usuário é direcionado para a página inicial da biblioteca.
Caso o e-mail ou senha estejam incorretos, uma mensagem de erro é apresentada.

## Proteção das páginas
Foi criado o arquivo:
verificar_login.php
Ele é responsável por verificar se existe um usuário conectado ao sistema.
As principais páginas do sistema foram protegidas.
Dessa forma, caso uma pessoa tente acessar diretamente uma página interna sem estar logada, ela é direcionada para:
login.php
Isso impede o acesso direto às funcionalidades da biblioteca sem autenticação.

## Logout
Também foi criado o arquivo:
logout.php
Essa página encerra a sessão do usuário.
Ao clicar em Sair da conta, a sessão é encerrada e o usuário retorna para a tela de login.

## Organização dos arquivos
O projeto ficou organizado aproximadamente da seguinte forma:
biblioteca/

│
├── index.php
├── conexao.php
├── style.css
│
├── login.php
├── cadastro_usuario.php
├── verificar_login.php
├── logout.php
│
├── cadastrar_livro.php
├── lista_livros.php
├── editar_livro.php
├── excluir_livro.php
├── pesquisar.php
├── emprestimos.php
├── relatorio.php
│
└── 
**outros arquivos necessários
Essa organização facilita a manutenção e a localização das funcionalidades do sistema.**

## Estilização
O sistema recebeu uma identidade visual própria.
A proposta visual foi baseada em uma aparência:
Delicada;
Aconchegante;
Simples;
Organizada;
Com cores suaves.
Foram utilizados principalmente tons de:
Rosa pastel;
Rosa queimado;
Creme;
Branco;
Marrom.

**Também foram adicionados efeitos de interação nos botões e links, deixando a navegação mais agradável.
O CSS foi centralizado principalmente no arquivo:
style.css
Isso permite manter um padrão visual entre as diferentes páginas.**

## Testes realizados
Durante o desenvolvimento foram realizados testes das principais funções do sistema.
Foram testados:
Conexão com o PostgreSQL;
Cadastro de usuário;
Login;
Logout;
Proteção das páginas;
Cadastro de livros;
Listagem de livros;
Edição de livros;
Exclusão de livros;
Pesquisa por título;
Pesquisa por autor;
Cadastro de empréstimos;
Controle de estoque;
Devolução de livros;
**Atualização do estoque após devolução;
Relatório da biblioteca.
Os testes foram realizados durante a construção do sistema para verificar o funcionamento das funcionalidades.**

## Resultado final
Ao final do desenvolvimento, foi criado um sistema web para gerenciamento de uma biblioteca, contendo tanto a parte de cadastro e organização dos livros quanto o controle de empréstimos e usuários.
O sistema permite que o usuário:
Entre com sua conta;
Cadastre livros;
Consulte os livros;
Edite informações;
Exclua livros;
Pesquise por título ou autor;
Registre empréstimos;
Registre devoluções;
Controle o estoque;
Consulte informações através de um relatório;
Encerre sua sessão.
O projeto também possui uma interface personalizada em HTML e CSS, buscando unir funcionalidade, organização e uma aparência agradável.

## Conclusão
O desenvolvimento do Sistema de Gerenciamento de Biblioteca possibilitou colocar em prática conhecimentos de HTML, CSS, PHP, PostgreSQL, SQL, PDO, formulários, sessões e operações com banco de dados.
O projeto começou com a ideia de criar uma biblioteca simples e foi sendo desenvolvido com diferentes funcionalidades até chegar a um sistema completo, incluindo autenticação de usuários, gerenciamento de livros, empréstimos, devoluções, pesquisa e relatórios.
Com isso, o sistema atende às principais necessidades propostas para o gerenciamento de uma biblioteca, mantendo uma estrutura simples e adequada para utilização e futuras melhorias.
