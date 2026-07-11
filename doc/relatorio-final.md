# Relatório final — Atividades 2 e 3

## 1. Resumo da Atividade 1

Na Atividade 1 foram feitos o planejamento do sistema, os modelos do banco e os diagramas. A pasta do código ainda estava vazia. Nas Atividades 2 e 3, o sistema foi desenvolvido e os materiais da apresentação foram preparados.

## 2. Funcionalidades implementadas

- login por usuário ou e-mail;
- página principal com os números do sistema;
- cadastro completo de veículos;
- cadastro e listagem de condutores e vagas;
- registro de entrada e saída com atualização da vaga;
- bloqueio de entrada duplicada e saída sem entrada aberta;
- consulta por placa, veículo, condutor, período e tipo;
- contato armazenado no banco;
- validação dos formulários e cuidados básicos de segurança.

## 3. Banco de dados

Arquivo: `banco/banco_de_dados.sql`.
Banco: `controle_veiculos`.
Tabelas: `usuarios`, `condutores`, `veiculos`, `vagas`, `movimentacoes` e `contatos`.

O arquivo SQL cria o banco, as tabelas, os relacionamentos e alguns dados para testar o sistema.

## 4. Diagramas atualizados

- `diagramas/atualizados/modelo-relacional-atualizado.svg`;
- `diagramas/atualizados/casos-de-uso-atualizado.svg`;
- fontes editáveis em `diagramas/fontes/`.

Os diagramas originais da Atividade 1 foram preservados.

## 5. Documentos produzidos

- diagnóstico da Atividade 1;
- relatório editável e PDF da Atividade 2;
- entrega curta editável e PDF de uma página;
- registro dos testes manuais;
- apresentação editável, PDF e roteiro da Atividade 3.

## 6. Localizações principais

- código-fonte: `src/`;
- PDF curto da Atividade 2: `doc/atividade-2/Atividade_2_Entrega_Curta.pdf`;
- relatório da Atividade 2: `doc/atividade-2/Atividade_2_MVP_Sistema_Veiculos.pdf`;
- apresentação: `doc/atividade-3/Apresentacao_Atividade_3_Sistema_Veiculos.pptx`;
- PDF da apresentação: `doc/atividade-3/Apresentacao_Atividade_3_Sistema_Veiculos.pdf`;
- roteiro: `doc/atividade-3/roteiro-apresentacao.md`.

## 7. Credenciais locais

- usuário: `admin`;
- e-mail: `admin@local.test`;
- senha: `Admin@2026`.

Credenciais exclusivas para demonstração acadêmica/local.

## 8. Testes executados

Foram feitos 17 testes manuais. Os resultados estão em `tests/testes-manuais.md`.

## 9. Conferência dos arquivos

- todos os arquivos PHP passaram em `php -l`;
- o SQL foi importado no MariaDB 10.4.32;
- a apresentação possui 8 slides;
- o PDF da apresentação possui 8 páginas;
- o PDF curto possui 1 página e o relatório completo possui 2 páginas;
- os documentos e os slides foram conferidos.

## 10. Limitações restantes

Os arquivos DOCX foram conferidos pelo conteúdo e os PDFs foram gerados com o mesmo texto. A apresentação também foi revisada slide por slide.

## 11. Arquivos criados

- `banco/banco_de_dados.sql`;
- código em `src/`;
- diagramas em `diagramas/fontes/` e `diagramas/atualizados/`;
- documentos em `doc/atividade-2/` e `doc/atividade-3/`;
- `doc/relatorio-final.md`;
- `tests/testes-manuais.md`.

## 12. Arquivo alterado

- `README.md`: acentuação corrigida e instruções completas de execução adicionadas.

## 13. Informação pendente

Não foi informada uma turma específica. A apresentação foi preparada com Rafael Dreyer como único apresentador.
