# Sistema de Entrada e Saída de Veículos

Projeto acadêmico da disciplina de Práticas Extensionistas III do curso de Análise e Desenvolvimento de Sistemas da UNOESC.

## Apresentação

O sistema foi criado para ajudar no controle de entrada e saída de veículos. Ele registra o veículo, o condutor, a vaga utilizada e os horários de entrada e saída.

## Problema e solução

Quando as informações ficam em papéis ou planilhas diferentes, é mais difícil saber quais veículos estão no local. O sistema reúne essas informações em um só lugar e pode ser executado no XAMPP.

## Funcionalidades

- login por usuário ou e-mail;
- página principal com os principais números do sistema;
- cadastro completo de veículos, com consulta, edição e exclusão;
- cadastro e listagem de condutores e vagas;
- registro de entrada e saída com atualização da vaga;
- bloqueio de entrada duplicada e de saída sem registro aberto;
- consulta por placa, veículo, condutor, período e tipo;
- formulário de contato com armazenamento no banco de dados;
- validação dos formulários e cuidados básicos de segurança.

## Tecnologias

- PHP 8;
- MySQL ou MariaDB;
- PDO;
- HTML5, CSS3 e JavaScript;
- XAMPP.

## Estrutura do repositório

```text
├── banco/                  arquivo SQL de instalação
├── diagramas/              diagramas originais e atualizados
├── doc/atividade-2/        documentos e entrega da Atividade 2
├── doc/atividade-3/        apresentação e roteiro da Atividade 3
├── documentacao/           documentos preservados da Atividade 1
├── src/                    código-fonte do sistema
└── tests/                  registro dos testes executados
```

## Requisitos para execução

- XAMPP com Apache, PHP 8 e MySQL/MariaDB;
- navegador atualizado;
- phpMyAdmin ou cliente MySQL para importar o banco.

## Instalação no XAMPP

1. Copie o repositório para `C:\xampp\htdocs\sistema-entrada-saida-veiculos`.
2. Inicie Apache e MySQL no painel do XAMPP.
3. Abra `http://localhost/phpmyadmin`.
4. Acesse **Importar** e selecione `banco/banco_de_dados.sql`.
5. Confirme que o banco `controle_veiculos` e as seis tabelas foram criados.
6. Se o MySQL local usar usuário ou senha diferentes, ajuste `src/config/database.php`.
7. Abra `http://localhost/sistema-entrada-saida-veiculos/src/login.php`.

O arquivo SQL utiliza UTF-8. Em importação pela linha de comando, use:

```powershell
C:\xampp\mysql\bin\mysql.exe --default-character-set=utf8mb4 -u root < banco\banco_de_dados.sql
```

## Credenciais de demonstração

Uso exclusivo no ambiente acadêmico/local:

- usuário: `admin`
- e-mail: `admin@local.test`
- senha: `Admin@2026`

A senha não está armazenada em texto puro no banco. O SQL contém somente o hash gerado pelo PHP.

## Como testar entrada e saída

1. Faça login.
2. Acesse **Movimentações > Registrar entrada**.
3. Selecione um veículo ativo e uma vaga livre.
4. Confirme a entrada e observe a vaga como ocupada.
5. Na lista de movimentações, clique em **Registrar saída**.
6. Confirme a saída e observe a vaga novamente livre.
7. Use **Consulta** para filtrar o histórico pela placa ou pelo período.

O banco de demonstração já possui uma movimentação finalizada e uma aberta. A vaga `M-01` começa ocupada para representar o veículo presente.

## Integrantes e informações acadêmicas

- aluno: Rafael Dreyer;
- professor: Jean Carlos Hennrichs;
- disciplina: Práticas Extensionistas III;
- curso: Análise e Desenvolvimento de Sistemas;
- instituição: UNOESC;
- local: Maravilha - SC;
- ano: 2026.

## Documentos e diagramas

- Atividade 1 preservada: `documentacao/` e arquivos originais de `diagramas/`;
- modelo relacional e caso de uso atualizados: `diagramas/atualizados/`;
- fontes editáveis dos diagramas: `diagramas/fontes/`;
- Atividade 2: `doc/atividade-2/`;
- Atividade 3: `doc/atividade-3/`.

## Repositório

https://github.com/rafaeldreyer/sistema-entrada-saida-veiculos

## Referências

- MDN Web Docs. **HTML: Linguagem de Marcação de Hipertexto**. Disponível em: https://developer.mozilla.org/pt-BR/docs/Web/HTML. Acesso em: 11 jul. 2026.
- PHP. **PHP Data Objects**. Disponível em: https://www.php.net/manual/pt_BR/book.pdo.php. Acesso em: 11 jul. 2026.
- PHP. **password_hash**. Disponível em: https://www.php.net/manual/pt_BR/function.password-hash.php. Acesso em: 11 jul. 2026.
- GITHUB. **Sobre repositórios**. Disponível em: https://docs.github.com/pt/repositories/creating-and-managing-repositories/about-repositories. Acesso em: 11 jul. 2026.
