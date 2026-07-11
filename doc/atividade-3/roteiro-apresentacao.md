# Roteiro de apresentação — Atividade 3

Projeto: Sistema de Entrada e Saída de Veículos
Apresentador: Rafael Dreyer
Tempo planejado: aproximadamente 9 minutos

## Slide 1 — Apresentação — 15 segundos

“Boa noite. Meu nome é Rafael Dreyer e vou apresentar o Sistema de Entrada e Saída de Veículos, desenvolvido na disciplina de Práticas Extensionistas III do curso de Análise e Desenvolvimento de Sistemas da UNOESC.”

## Slide 2 — Problema identificado — 30 segundos

“O problema é que os registros podem ficar em papéis ou planilhas diferentes. Assim, fica mais difícil conferir horários, localizar uma placa e saber quais vagas estão ocupadas.”

## Slide 3 — Solução proposta — 30 segundos

“O sistema reúne as informações em um só lugar. Na entrada, são informados o veículo, o condutor e a vaga. Na saída, o horário é registrado e a vaga volta a ficar livre. Também é possível consultar os registros anteriores.”

## Slide 4 — Modelo do banco de dados — 1 minuto

“O banco possui seis tabelas relacionadas. Elas guardam os usuários, condutores, veículos, vagas, entradas e saídas e as mensagens de contato. Enquanto um veículo está no local, o horário de saída fica em branco e a vaga aparece como ocupada.”

## Slide 5 — Diagrama de casos de uso — 1 minuto

“Os usuários definidos na primeira atividade são o Administrador e o Operador ou Porteiro. Os dois podem entrar no sistema, ver a página principal, registrar entradas e saídas e fazer consultas. O Administrador também pode acessar os cadastros.”

## Slide 6 — Demonstração do protótipo — 5 minutos

“Agora vou mostrar o sistema funcionando.”

Passos da demonstração:

1. Abrir `src/login.php` e entrar com `admin` / `Admin@2026`.
2. Mostrar o painel e explicar veículos ativos, entradas, saídas e presentes.
3. Abrir Veículos, cadastrar um veículo, visualizar, editar e mostrar a confirmação antes de excluir.
4. Abrir Movimentações, registrar uma entrada e mostrar a vaga ocupada.
5. Tentar repetir a entrada do mesmo veículo e mostrar o bloqueio.
6. Registrar a saída e mostrar a vaga novamente livre.
7. Abrir Consulta, filtrar pela placa e pelo período e limpar os filtros.
8. Abrir Contato, preencher os quatro campos e enviar a mensagem.
9. Voltar aos slides no slide 7.

Sugestão de dados para a demonstração: placa `DEM1O26`, marca `Volkswagen`, modelo `Gol`, cor `Branco`, ano `2020`. Usar uma vaga livre e excluir o veículo somente se não houver movimentação relacionada.

## Slide 7 — Resultados — 45 segundos

“O sistema possui login, página principal, cadastro de veículos, entrada, saída, consulta e contato. Foram feitos dezessete testes manuais. Como melhorias futuras, podem ser criados relatórios e mais opções para os outros cadastros.”

## Slide 8 — Encerramento — 15 segundos

“Obrigado pela atenção. Fico à disposição para perguntas.”

## Observações para a apresentação

- Manter os slides abertos antes de iniciar.
- Deixar XAMPP, banco e navegador preparados.
- Importar novamente o SQL antes da apresentação se os dados de teste estiverem desorganizados.
- Não ultrapassar cinco minutos na demonstração.
- Se ocorrer algum erro, voltar à página principal e continuar a explicação.
