# Diagnóstico da Atividade 1

## O que já estava pronto

A Atividade 1 já tinha o planejamento do Sistema de Entrada e Saída de Veículos. O repositório possuía os documentos, os modelos do banco e os diagramas UML. Também já estavam definidas as tecnologias e os usuários do sistema: Administrador e Operador/Porteiro.

## O que precisava ser desenvolvido

A pasta `src` ainda estava vazia. Era necessário criar o banco, o login, a página principal, os cadastros, as entradas e saídas, a consulta, o contato, os testes e os arquivos das Atividades 2 e 3.

## Tabelas previstas e mantidas

`usuarios`, `condutores`, `veiculos`, `vagas`, `movimentacoes` e `contatos`.

## Funcionalidades implementadas

Foram feitos o login, a página principal, o cadastro completo de veículos, o cadastro de condutores e vagas, o registro de entrada e saída, a consulta e o formulário de contato. O sistema também impede uma entrada repetida e uma saída sem entrada registrada.

## Diagramas que precisam de atualização

O modelo relacional e o caso de uso precisavam acompanhar as funções criadas no sistema. Os diagramas antigos foram mantidos e as versões atualizadas estão em `diagramas/atualizados`.

## Inconsistências encontradas

- O README estava com caracteres acentuados corrompidos.
- O texto dizia que o diretório de código era `/src`, mas ele possuía apenas `.gitkeep`.
- O modelo conceitual relacionava contato de forma independente, coerente com o formulário; isso foi mantido.
- A Atividade 1 prevê o gerenciamento de usuários, condutores e vagas. Nesta versão, o cadastro completo foi feito para veículos. Condutores e vagas possuem as funções necessárias para registrar entradas e saídas. O usuário de demonstração é criado pelo arquivo SQL.

## Informações confirmadas e ausentes

Foram confirmados no material: Rafael Dreyer, professor Jean Carlos Hennrichs, UNOESC, campus/cidade de Maravilha - SC e ano 2026. Não foi informada turma específica; por isso ela não foi incluída.
