<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--BOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <?php
        session_start();
        if($_SESSION['nivelAcesso'] != 1){
            return header('Location: login.php');
        }
    ?>
    <title>Área Administrativa</title>
</head>

<body>
    <div class="d-block p-2">
        <div class="float-right">
            <div class="dropdown">
                <i class="fas fa-users-cog btn btn-primary dropdown-toggle" id="AccountMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><input type="button" value="Minha Conta" class="btn primary dropdown-toggle"></i>
                <div class="dropdown-menu" aria-labelledby="AccountMenu">
                    <a class="dropdown-item" href="#">Action</a>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">Opções
            <small>#</small>
        </h1>
        <hr>
        <!-- Project One -->
        <div class="row">
            <div class="col-md-5">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="https://img.icons8.com/metro/420/add-file.png" alt="" width="300" height="700">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Adcionar Video</h3>
                <p>Opção para adicionar vídeo</p>
                <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVideo" value="Upload Video">
            </div>
        </div>
        <!-- /.row -->
        <hr>
    </div>
    <!--<hr> !-->

    <!--MODAL VIDEO!-->
    <div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="modalVideo1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVideo1">Enviar Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!---Conteudo do Modal!-->
                <div class="modal-body">
                    <form action="../controller/controller.php?req=adicionarVideo" method="post">

                        <div class="form-group">
                            <label for="inputNome" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="inputNome" name="inputNome">
                        </div>
                        <div class="form-group">
                            <label for="txtDesc" class="col-form-label">Descrição:</label>
                            <textarea class="form-control" id="txtDesc" name="txtDesc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputURL" class="col-form-label">URL:</label>
                            <input type="url" class="form-control" id="inputURL" name="inputURL">
                        </div>

                        <hr>

                        <!--FIM DO MODAL!-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-primary" value="Adicionar">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</body>

</html>