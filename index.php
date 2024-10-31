<!DOCTYPE html>
<html lang="pt-br">

<style>
.cabecalho {
  padding: 2rem 1rem;
  margin-bottom: 2rem;
  background-color: #2e70b1;
  border-radius: 0.3rem;
    display: flex;
    justify-content: flex-start;
    align-content: flex-start;

}
</style>


<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Página Inicial</title>
</head>

<body>
    <div class="container">
        <div class="cabecalho">
            <h2 style="margin: auto;">Teste CRUD <span class="badge badge-secondary"></span></h2>
        </div>

       
        <div class="container mt-5">
            <button type="button" class="btn btn-primary open-modal" data-url="create.php" data-toggle="modal" data-target="#myModal">
                Criar Novo 
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Carregando...</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalContent">
                        <!-- Conteúdo carregado dinamicamente será exibido aqui -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela de dados -->
        <table class="table table-striped" style="margin-top: 1em;">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Data-hora</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'banco.php';
                $pdo = Banco::conectar();
                $sql = 'SELECT * FROM consuta ORDER BY id DESC'; 
                
                foreach($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<th scope="row">'. $row['id'] . '</th>';
                    echo '<td>'. $row['nome'] . '</td>';
                    echo '<td>'. $row['doutor'] . '</td>';
                    echo '<td>'. date('d/m/Y H:i:s', strtotime($row['data_hora'])) . '</td>';
                    echo '<td>'. $row['endereco'] . '</td>';
                    echo '<td>'. $row['telefone'] . '</td>';
                    echo '<td>'. $row['email'] . '</td>';
                    echo '<td>'. $row['sexo'] . '</td>';
                    echo '<td width=250>';
                    echo '<button class="btn btn-primary open-modal" data-url="read.php?id='.$row['id'].'" data-toggle="modal" data-target="#myModal">Info</button> ';
                    echo '<button class="btn btn-warning open-modal" data-url="update.php?id='.$row['id'].'" data-toggle="modal" data-target="#myModal">Atualizar</button> ';
                    echo '<button class="btn btn-danger open-modal"  data-url="delete.php?id='.$row['id'].'" data-toggle="modal" data-target="#myModal">Excluir</button> ';
                    echo '</td>';
                    echo '</tr>';
                }
                Banco::desconectar();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            // Evento de clique para carregar conteúdo dinâmico no modal
            $('.open-modal').on('click', function() {
                const url = $(this).data('url');
                
                // Define o título do modal dependendo do URL
                const modalTitle = url.includes("create") ? "Criar Novo Registro" :
                                   url.includes("info") ? "Informações do Registro" :
                                   url.includes("edit") ? "Editar Registro" :
                                   url.includes("delete") ? "Deletar Registro" : "Carregando...";

                $('#exampleModalLabel').text(modalTitle);

                // Carrega o conteúdo do arquivo PHP fornecido na URL
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        $('#modalContent').html(data);
                    },
                    error: function() {
                        $('#modalContent').html('<p>Erro ao carregar conteúdo.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
