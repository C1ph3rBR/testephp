# CRUD com PHP, Bootstrap e JavaScript

Aplicação CRUD (Create, Read, Update, Delete) desenvolvida utilizando PHP, Bootstrap e JavaScript. 
A aplicação permite gerenciar registros de consulta, como nome do paciente, médico, data-hora, endereço, telefone, email e sexo.

## Tecnologias Utilizadas

- **PHP**: Utilizado para conectar ao banco de dados e gerenciar a lógica do CRUD.
- **Bootstrap**: Utilizado para criar uma interface responsiva e atraente para a aplicação.
- **JavaScript (jQuery)**: Utilizado para manipular o DOM e carregar conteúdos dinâmicos nos modais.

## Funcionalidades

- **Criar Novo Registro**: Possibilidade de adicionar um novo paciente na base de dados.
- **Visualizar Registro**: Abrir um modal com os detalhes de um paciente selecionado.
- **Atualizar Registro**: Editar os dados de um paciente existente.
- **Excluir Registro**: Remover um paciente da base de dados.

## Estrutura do Projeto

- **index.html**: Arquivo principal que contém a interface da aplicação, incluindo os botões para criar, editar, excluir e visualizar registros.
- **banco.php**: Arquivo de conexão com o banco de dados utilizando PDO.
- **create.php, read.php, update.php, delete.php**: Arquivos que contêm a lógica para cada uma das funcionalidades CRUD.

## Como Usar

1. **Clone o Repositório**:
   ```bash
   git clone https://github.com/C1ph3rBR/testephp.git
   ```

2. **Configurar o Banco de Dados**:
   - Crie um banco de dados MySQL no http://localhost/phpmyadmin/ e ajuste as credenciais no arquivo `banco.php`.
   - Execute o script SQL para criar a tabela `consulta`:
   ```sql
   CREATE TABLE consulta (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `doutor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_hora` datetime NOT NULL
   )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
   ```

3. **Instalar Dependências**:
   - Certifique-se de que você tem o PHP e XAMPP configurado em seu ambiente.
   - Inicie no XAMPP o servidor Apache e o MySQL

4. **Executar a Aplicação**:
   - Abra o navegador e acesse `http://127.0.0.1/testephp-1/index.php.

## Licença

Este projeto está sob a licença MIT. Consulte o arquivo `LICENSE` para obter mais informações.

