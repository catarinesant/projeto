<<<<<<< HEAD
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
