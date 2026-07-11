# Testes manuais do sistema

Data: 11 de julho de 2026
Ambiente: PHP 8.2.12, MariaDB 10.4.32 do XAMPP e navegador.

| Nº | Teste | Resultado esperado | Resultado encontrado |
|---:|---|---|---|
| 1 | Login correto | Abrir a página principal | Aprovado; o painel foi exibido. |
| 2 | Login incorreto | Exibir mensagem sem criar sessão | Aprovado; exibiu “Usuário ou senha inválidos”. |
| 3 | Página interna sem login | Redirecionar ao login | Aprovado; redirecionou e exibiu aviso. |
| 4 | Cadastro de veículo | Salvar e listar o veículo | Aprovado com a placa de teste `TES1T23`. |
| 5 | Edição de veículo | Atualizar o modelo | Aprovado; “Ka Teste” mudou para “Ka Editado”. |
| 6 | Exclusão permitida | Excluir veículo sem vínculo | Aprovado com a placa temporária `DEL1E23`. |
| 7 | Exclusão com vínculo | Impedir exclusão | Aprovado; orientou alterar o status para inativo. |
| 8 | Registro de entrada | Criar movimentação e ocupar vaga | Aprovado para `TES1T23` e vaga `A-01`. |
| 9 | Entrada duplicada | Bloquear nova entrada aberta | Aprovado; exibiu mensagem específica. |
| 10 | Registro de saída | Finalizar movimentação e liberar vaga | Aprovado. |
| 11 | Saída sem entrada aberta | Impedir nova saída | Aprovado; botão ficou desabilitado e houve aviso. |
| 12 | Consulta por placa | Mostrar somente a placa informada | Aprovado para `TES1T23`. |
| 13 | Consulta por período | Mostrar registros do dia | Aprovado para 11/07/2026. |
| 14 | Consulta sem resultados | Exibir mensagem | Aprovado com a placa inexistente `ZZZ9Z99`. |
| 15 | Formulário de contato | Armazenar mensagem e confirmar | Aprovado; confirmação exibida e registro criado. |
| 16 | Campos obrigatórios vazios | Exibir erros do servidor | Aprovado; quatro mensagens foram exibidas no contato. |
| 17 | Diferentes tamanhos de tela | Manter uso em celular | Aprovado; o menu e as tabelas funcionaram na tela do celular. |

## Verificações adicionais

- Todos os arquivos PHP passaram em `php -l`.
- O arquivo SQL criou o banco, as seis tabelas e os dados de teste.
- O login foi testado com a senha de demonstração.
- Depois dos testes, o banco voltou aos dados iniciais.

## Erro corrigido durante os testes

No primeiro teste, o login apresentou o erro `HY093` por usar o mesmo parâmetro duas vezes na consulta. A consulta foi corrigida e o login foi testado novamente com sucesso.
