# [Rent a Car](https://github.com/EvyOliveira/LocadoraPHP)

> Projeto pertencente à disciplina eletiva de PHP - Linguagem de Programação para internet. Consiste em representar um painel administrativo do negócio de uma locadora de veículos corporativos. A ideia inicial é apresentar um sistema de acesso com informações que poderão ser acessadas por administradores e/ou gestores das respectivas filiais. A solução é dada por um banco de dados relacional que armazenará dados cadastrais do sistema e uma aplicação web para interação entre os colaboradores da locadora corporativa. 

## Funcionalidades

- **Sistema de login e autenticação:**
  - Página de login
  - Página de recuperação de conta
  - Página de cadastro

- **Cadastro de usuários:**
  - Página de cadastro de usuários

- **Funcionalidades:**
  - Botão de alteração de dados cadastrados
  - Botão de exclusão de registros
  - Botão de reset de senha

## Primeira avaliação de PHP

- Criar a funcionalidade "alterar" para que este altere somente nome e/ou e-mail dos usuários cadastrados
- Criar a funcionalidade "resetar senha" que irá atribuir a senha padrão 123456 para o úsuario
- A coluna de senha deve armazenar um hash MD5 das senhas ao invés do texto plano
- Criar mecanismo que obrigue o usuário com senha padrão a trocar sua senha ao logar no sistema
- Fazer o ajuste da página de login para a correta autenticação dos usuários

## Versionamento

Para acompanhamento do versionamento, siga o link onde possui a arelação de todos os commits [](https://github.com/EvyOliveira/LocadoraPHP/commits).

## Rode o projeto localmente

**1 -** Prepare o ambiente:
- Selecionar um servidor de sua preferência (recomendamos utilizar o UwAmp 3.1.0 para o pleno funcionamento)
- Configurar o PhpMyAdmin para persistência dos dados
- Estabelecer conexão entre o banco de dados e a aplicação com o conteúdo do arquivo config.php

**2 -** Clone o projeto em sua máquina:
```sh
$ git clone https://github.com/EvyOliveira/LocadoraPHP
```
- Mova o projeto até o diretório 'www' localizada na raiz do UwAmp

**3 -** Rode o projeto no modo de desenvolvedor:
- Selecionar a porta de resposta da aplicação

