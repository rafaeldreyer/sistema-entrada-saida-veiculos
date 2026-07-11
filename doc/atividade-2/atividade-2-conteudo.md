# Atividade 2 — MVP do Sistema de Entrada e Saída de Veículos

**Aluno:** Rafael Dreyer
**Disciplina:** Práticas Extensionistas III
**Professor:** Jean Carlos Hennrichs
**Curso:** Análise e Desenvolvimento de Sistemas — UNOESC
**Ano:** 2026

## Objetivo

Desenvolver uma primeira versão funcional do sistema planejado na Atividade 1. O sistema permite cadastrar veículos, registrar entradas e saídas e consultar os registros.

## Resumo do MVP

O sistema foi desenvolvido em PHP 8 com banco MySQL/MariaDB. Ele possui login, página principal, cadastro de veículos, condutores e vagas, registro de entrada e saída, consulta e formulário de contato.

## Funcionalidades implementadas

- login por usuário ou e-mail e opção de sair;
- painel com veículos ativos, entradas, saídas e veículos presentes;
- cadastro, listagem, pesquisa, visualização, edição e exclusão de veículos;
- cadastro de condutores e vagas;
- entrada e saída com data e horário e atualização da vaga;
- bloqueio de entrada duplicada e de saída sem entrada aberta;
- consulta por placa, veículo, condutor, período e tipo;
- contato armazenado no banco;
- mensagens de confirmação e de erro nos formulários.

## Tecnologias utilizadas

PHP 8, MySQL/MariaDB, PDO, HTML5, CSS3, JavaScript e XAMPP.

## Repositório e código-fonte

Repositório: https://github.com/rafaeldreyer/sistema-entrada-saida-veiculos
Pasta exata do código-fonte: `/src`

## Execução resumida

Copiar o projeto para o `htdocs` do XAMPP, iniciar Apache e MySQL, importar `banco/banco_de_dados.sql` no phpMyAdmin e abrir `/src/login.php`. As credenciais acadêmicas são `admin` e `Admin@2026`.

## Considerações finais

O sistema colocou em prática o que foi planejado na Atividade 1. As principais funções foram desenvolvidas e estão funcionando. No futuro, ainda podem ser adicionados relatórios e mais opções para gerenciar usuários, condutores e vagas.

## Referências

MDN WEB DOCS. **HTML: Linguagem de Marcação de Hipertexto**. Disponível em: https://developer.mozilla.org/pt-BR/docs/Web/HTML. Acesso em: 11 jul. 2026.

PHP. **PHP Data Objects**. Disponível em: https://www.php.net/manual/pt_BR/book.pdo.php. Acesso em: 11 jul. 2026.

PHP. **password_hash**. Disponível em: https://www.php.net/manual/pt_BR/function.password-hash.php. Acesso em: 11 jul. 2026.

GITHUB. **Sobre repositórios**. Disponível em: https://docs.github.com/pt/repositories/creating-and-managing-repositories/about-repositories. Acesso em: 11 jul. 2026.
